<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CoursesController extends Controller
{
    public function index(){

        $courses = DB::table('courses')->get();
        //dd("test");
        //dd($courses);
        foreach($courses as $course){
            // Получаем имя создателя
            $creator = DB::table('users')->where('id', $course->creator_id)->first();
            $course->creator_name = $creator->name;
            // Получаем кол-во просмотров курса
            $course_views = DB::table('course_views')->where('course_name', $course->name)->count();
            if($course_views){
                $course->views = $course_views;
            } else {
                $course->views = 0;
            }
            //для превью обрезаем тэги
            $clear_descr = str_replace("&nbsp;", '', $course->description);
            $course->description =  strip_tags($clear_descr);
        }
        // dd($courses);

        return view('courses.index', compact('courses') );
    }

    public function new_course(){

        return view('courses.create_course');
    }


    public function create_course(Request $request){

        $all_info = $request->all();
        // dd($all_info);
        //dd($request->course_image);
        //$img_path = $request->course_image;

        if($request->hasFile('course_image')){
            $filename = time().'.'.request()->course_image->getClientOriginalExtension();
            request()->course_image->move(public_path('images'), $filename);
        }else{
            $filename = "";
        }

        //$user->image=$filename;
        //$user->save();

        DB::table('courses')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'course_image_path' => $filename,
            'creator_id' => Auth::user()->id,
            'visibility' => 'all',
        ]);

        return redirect('courses_controll')->with('message_success', 'Курс успешно создан!');
    }

    public function edit_course($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        $courses_question_answers = DB::table('courses_faq')->where('course_id', $course_id)->get();
        //dd($courses_question_answers);

        $course_lessons = DB::table('courses_program')->where('course_id', $course_id)->get();
        //dd($course_lessons);
        //$videos_arr = [];
        foreach($course_lessons as $lesson){

            //dd(json_decode($lesson->video_name));
            if($lesson->video_name == null || $lesson->video_name == "null" ){
                $lesson->video_count = 0;
            } else {
                $lesson->video_count = count(json_decode($lesson->video_name));
            }

            // $video_arr = [];
            // $i = 0;
            // foreach(json_decode($lesson->video_name) as $video){
            //     $video_arr["video_name"] = $video;
            //     $i++;
            // }
            // $a = 0;
            // foreach(json_decode($lesson->video_length) as $video_l){
            //     $video_arr["video_length"] = $video_l;
            //     //$a++;
            // }
            // dd($video_arr);

        }


        $teacher_arr = json_decode($course_info->assigned_teacher_id);
        //dd($teacher_arr);
        if($teacher_arr){
            $assigned_teachers =  DB::table('users')->whereIn('id', $teacher_arr)->get();
            $teachers = DB::table('users')->where('role', 'teacher')->whereNotIn('id', $teacher_arr)->get();

            foreach($assigned_teachers as $teacher){
                $t_descr = DB::table('teachers')->where('user_id', $teacher->id)->first();
                if(isset($t_descr->descr)){
                    $teacher->descr = $t_descr->descr;
                } else {
                    $teacher->descr = "";
                }
            }
        } else {
            $assigned_teachers = [];
            $teachers = DB::table('users')->where('role', 'teacher')->get();
        }
        //dd($assigned_teachers);
        $course_information = DB::table('courses_information')->where('course_id', $course_id)->first();

        //dd($course_info);
        return view('courses.edit_course', compact('course_info', 'courses_question_answers', 'course_lessons', 'teachers', 'assigned_teachers', 'course_information') );
    }

    public function delete_course($course_id){

        //dd($course_id);

        DB::table('courses')->where('id', $course_id)->delete();
        DB::table('courses_faq')->where('course_id', $course_id)->delete();
        DB::table('courses_information')->where('course_id', $course_id)->delete();
        DB::table('courses_program')->where('course_id', $course_id)->delete();

        return back();
    }

    public function delete_teacher_course($course_id, $teacher_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();
        // Берем аррей учителей - декодим
        $teacher_arr = json_decode($course_info->assigned_teacher_id);

        // Убираем лишнее значение
        $new_arr = array_splice($teacher_arr, array_search($teacher_id, $teacher_arr ), 1);

        DB::table('courses')->where('id', $course_id)->update([
            'assigned_teacher_id' => json_encode($teacher_arr),
        ]);



        return redirect()->back();
    }

    public function delete_photo($course_id){
        //dd($course_id);
        DB::table('courses')->where('id',$course_id)->update([
            'course_image_path' => null,
        ]);
        return back();
    }

    public function edit_course_apply($course_id, Request $request){

        //dd($request->all());

        // Таблица курсов
        $current_course = DB::table('courses')->where('id', $course_id)->first();

        // Получаем картинку // Если картинка есть
        if($request->hasFile('course_image')){
            $filename = time().'.'.request()->course_image->getClientOriginalExtension();
            request()->course_image->move(public_path('images'), $filename);

            // Обновляем картинку в базе
            DB::table('courses')->where('id',$course_id)->update([
                'course_image_path' => $filename,
            ]);
        }

        if($current_course->assigned_teacher_id){
            //array_push($teachers_arr, )
            $teacher_arr = json_decode($current_course->assigned_teacher_id);
            //dd($teachers_arr);
        } else {
            $teacher_arr = [];
        }


        $t_id = $request->assigned_teacher_id;
        if($t_id != "Выберите"){
            array_push($teacher_arr, $t_id);
            $teachers = json_encode($teacher_arr);
        } else {
            $teachers = $teacher_arr;
        }


        DB::table('courses')->where('id',$course_id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'assigned_teacher_id' => $teachers,
        ]);

        return redirect()->back();
    }

    public function ajax_remove_teacher(Request $request){

        $course_id = $request->course_id;
        $teachers = json_encode($request->teachers);

        DB::table('courses')->where('id', $course_id)->update([
            'assigned_teacher_id' => $teachers,
        ]);

        echo 'Teachers updated';
    }

    // edit_about
    public function edit_about($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        $course_i = DB::table('courses_information')->where('course_id', $course_id)->first();
        //dd($course_i);



        return view('courses.edit_about', compact('course_info', 'course_i'));
    }
    // edit_about_apply
    public function edit_about_apply($course_id, Request $request){

        //dd($request->questions_counter);
        //dd($request->all());
        // Делаем аррей из пунктов
        //$courses_arr = json_encode($request->course_learn, JSON_UNESCAPED_UNICODE);

        $q_c = $request->questions_counter;
        $course_lrn_arr = [];
        for($i = 1; $i <= $q_c; $i++){
            $c = "course_learn" . $i;
            //dd($c);
            array_push($course_lrn_arr, $request->$c);//strip_tags ($request->$c));
        }
        //dd($course_lrn_arr);

        $courses_arr = json_encode($course_lrn_arr, JSON_UNESCAPED_UNICODE);

        // Берем информацию описания курса
        $about_check = DB::table('courses_information')->where('course_id', $course_id)->first();
        // Если инфа есть
        if(isset($about_check)){
            // Обновляем
            DB::table('courses_information')->where('course_id', $course_id)->update([
                'course_description' => $request->course_description,
                'course_learn_arr' => $courses_arr,
            ]);
        } else {
            // Если нет, создаем
            DB::table('courses_information')->insert([
                'course_id' => $course_id,
                'course_description' => $request->course_description,
                'course_learn_arr' => $courses_arr,
            ]);
        }

        //return redirect()->back();
        return \Redirect::route('edit_course', $course_id)->with('message', 'ІНФОРМАЦІЯ ПРО КУРС ОНОВЛЕНА');
        //return redirect()->route('');
        //return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }
    // add_lesson
    public function add_lesson($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        $courses_program = DB::table('courses_program')->where('course_id', $course_id)->get();
        //dd($courses_program);
        // if(!$courses_program->isEmpty()){
        //     // Аррей айдишников тестов
        //     $test_ids_arr = [];
        //     // Берем все айди и заносим в аррей
        //     foreach($courses_program as $course_program){
        //         array_push($test_ids_arr, $course_program->test_id);
        //     }
        //     //dd($test_ids_arr);
        //     $course_tests = DB::table('tests_info')->whereIn('id', $test_ids_arr)->get();
        // } else {
        //     $course_tests = [];
        // }
        //dd($course_tests);
        //dd($tests);

        $course_tests = [];


        return view('courses.add_lesson', compact('course_info', 'course_tests'));
    }

    // add_lesson_apply
    public function add_lesson_apply($course_id, Request $request){

        //dd($request->all());

        // Количество видео
        $video_counter = $request->videos_counter;

        // Арреи под инфу видео
        $video_name_arr = [];
        $video_lenght_arr = [];
        $video_file_arr = [];
        $video_link_arr = [];

        // Перебираем и берем информацию о каждом видео
        for($i = 0; $i <= $video_counter; $i++){
            // Формируем реквест имя
            $r_video_name = 'video_name' . $i;
            $r_video_length = 'video_length' . $i;
            $r_video_file = 'video_file' . $i;
            $r_video_link = 'video_link' . $i;

            // Получаем информацию по имени
            $video_name = $request->$r_video_name;
            $video_length = $request->$r_video_length;

            //$video_file = $request->$r_video_file;

            if($request->hasFile($r_video_file)){
                $filename = time().'.'.request()->$r_video_file->getClientOriginalExtension();
                request()->$r_video_file->move(public_path('video_files'), $filename);
            }else{
                $filename = null;
            }

            $video_link = $request->$r_video_link;
            // Заносим информацию в аррей
            if($video_name == null){ $video_name_arr = null; } else { array_push($video_name_arr, $video_name); }
            if($video_length == null){ $video_lenght_arr = null; } else { array_push($video_lenght_arr, $video_length); }
            if($filename == null){ $video_file_arr = null; } else { array_push($video_file_arr, $filename); }
            if($video_link == null){ $video_link_arr = null; } else { array_push($video_link_arr, $video_link); }

        }
        //dd($video_file_arr);

        // Аррей документов
        $docs_arr = [];
        // Количество документов
        $docs_counter = $request->docs_counter;
        // Перебираем и берем информацию о каждом доке
        for($a = 0; $a <= $docs_counter; $a++){
            // Реквест имени дока
            $r_add_document = 'add_document' . $a;

            // Получаем доку, формируем имя и переносим файл
            if($request->hasFile($r_add_document)){
                $filename_doc = time().'.'.request()->$r_add_document->getClientOriginalExtension();
                request()->$r_add_document->move(public_path('docs'), $filename);
            }else{
                $filename_doc = null;
            }
            // Передача инфы в аррей
            if($filename_doc == null){ $docs_arr = null; } else { array_push($docs_arr, $filename_doc); }
            //array_push($docs_arr, $filename);
        }
        // show prot
        if($request->show_protocol){
            $protocol = $request->show_protocol;
        } else {
            $protocol = false;
        }

        // Инсерт в базу
        $courses_program_id = DB::table('courses_program')->insertGetId([
            'course_id' => $course_id,
            'course_name' => $request->course_name,
            'course_description' => $request->course_description,
            'learning_time' => $request->learning_time,
            'show_protocol' => $protocol,
            'course_protocol_descr' => $request->course_protocol_descr,
            'learning_protocol_time' => $request->learning_protocol_time,
            'add_document' => json_encode($docs_arr),
            'video_name' =>  json_encode($video_name_arr),
            'video_length' => json_encode($video_lenght_arr),
            'video_file' =>  json_encode($video_file_arr),
            'video_link' => json_encode($video_link_arr),
            'model3d_link' => $request->model3d_link,
        ]);

        // Проверяем есть ли запрос на создание теста
        $redirect_to_test = $request->redirect_to_test;
        //dd($redirect_to_test);
        if(isset($redirect_to_test)){
            // Редиректим на создание теста
            return redirect()->route('new_test_info', ['course_id' => $course_id, 'courses_program_id' => $courses_program_id ]);
        } else {
            // Редиректим на список курсов
            return redirect('courses_controll')->with(['message_success' => 'Курс успешно обновлен!', 'courses_program_id' => $courses_program_id]);
        }
        //return redirect('courses_controll')->with(['message_success' => 'Курс успешно обновлен!', 'courses_program_id' => $courses_program_id]);
    }

    // edit lesson
    public function edit_lesson($course_id, $lesson_id){

        // Инфо курса
        $course_info = DB::table('courses')->where('id', $course_id)->first();

        $courses_program = DB::table('courses_program')->where('course_id', $course_id)->get();
        // if(!$courses_program->isEmpty()){
        //     // Аррей айдишников тестов
        //     $test_ids_arr = [];
        //     // Берем все айди и заносим в аррей
        //     foreach($courses_program as $course_program){
        //         array_push($test_ids_arr, $course_program->test_id);
        //     }
        //     //dd($test_ids_arr);
        //     $course_tests = DB::table('tests_info')->whereIn('id', $test_ids_arr)->get();
        // } else {
        //     $course_tests = [];
        // }

        $course_tests_id = DB::table('courses_program')->where([
            'id' => $lesson_id,
            'course_id' => $course_id
        ])->first();

        $course_tests = DB::table('tests_info')->where('id', $course_tests_id->test_id)->get();

        // Инфо урока
        $lesson_info = DB::table('courses_program')->where('id', $lesson_id)->first();

        return view('courses.edit_lesson', compact('course_info', 'course_tests', 'lesson_info'));

    }

    // edit lesson apply
    public function edit_lesson_apply($course_id, $lesson_id, Request $request){

        //dd($request->all());

        $video_counter = $request->videos_counter;

        // Арреи под инфу видео
        $video_name_arr = [];
        $video_lenght_arr = [];
        $video_file_arr = [];
            $old_video_names = [];
        $video_link_arr = [];

        // Перебираем и берем информацию о каждом видео
        for($i = 0; $i <= $video_counter; $i++){
            // Формируем реквест имя
            $r_video_name = 'video_name' . $i;
            $r_video_length = 'video_length' . $i;
            $r_video_file = 'video_file' . $i;
            $r_video_link = 'video_link' . $i;

            // Получаем информацию по имени
            $video_name = $request->$r_video_name;
            $video_length = $request->$r_video_length;


            //$video_file = $request->$r_video_file;

            if($request->hasFile($r_video_file)){
                $filename = time().'.'.request()->$r_video_file->getClientOriginalExtension();
                request()->$r_video_file->move(public_path('video_files'), $filename);
            }else{
                $filename = null;
                $r_add_video_name = 'video_file_name' . $i;
                $old_video_name = $request->$r_add_video_name;
                //dd($old_file_name);
                if($old_video_name != null){
                    array_push($old_video_names, $old_video_name);
                }
            }

            $video_link = $request->$r_video_link;
            // Заносим информацию в аррей
            if($video_name == null){  } else { array_push($video_name_arr, $video_name); }
            if($video_length == null){  } else { array_push($video_lenght_arr, $video_length); }
            if($filename == null){  } else { array_push($video_file_arr, $filename); }
            if($video_link == null){  } else { array_push($video_link_arr, $video_link); }

        }
        // Мерджим старые названия с новыми
        $video_file_arr = array_merge($video_file_arr, $old_video_names);
        //dd($video_file_arr);

        // Аррей документов
        $docs_arr = [];
        // Аррей старых названий
        $docs_names_arr = [];
        // Количество документов
        $docs_counter = $request->docs_counter;

        // Перебираем и берем информацию о каждом доке
        for($a = 0; $a <= $docs_counter; $a++){

            // Реквест имени дока
            $r_add_document = 'add_document' . $a;
            //dd($request->hasFile($r_add_document));
            // Получаем доку, формируем имя и переносим файл
            if($request->hasFile($r_add_document)){
                $filename_doc = time().'.'.request()->$r_add_document->getClientOriginalExtension();
                request()->$r_add_document->move(public_path('docs'), $filename);
            }else{
                $filename_doc = null;
                $r_add_doc_name = 'add_document_name' . $a;
                $old_file_name = $request->$r_add_doc_name;
                //dd($old_file_name);
                if($old_file_name != null){
                    array_push($docs_names_arr, $old_file_name);
                }
            }
            // Передача инфы в аррей
            if($filename_doc == null){  } else { array_push($docs_arr, $filename_doc); }
            //array_push($docs_arr, $filename_doc);
        }
        // Перебираем старые имена файлов
        // for($b = 0; $b <= $docs_counter; $b++){
        //     // Получаем имя старого файла (если есть)
        //     $r_add_doc_name = 'add_document_name' . $b;
        //     $old_file_name = $request->$r_add_doc_name;
        //     //dd($old_file_name);
        //     if($old_file_name != null){
        //         array_push($docs_names_arr, $old_file_name);
        //     }
        // }

        // Мерджим старые и новые имена
        $docs_arr = array_merge($docs_arr, $docs_names_arr);
        //dd($docs_arr);
        // show prot
        if($request->show_protocol){
            $protocol = $request->show_protocol;
        } else {
            $protocol = false;
        }

        // Инсерт в базу
        $courses_program_id = DB::table('courses_program')->where('id', $lesson_id)->update([
            'course_id' => $course_id,
            'course_name' => $request->course_name,
            'course_description' => $request->course_description,
            'learning_time' => $request->learning_time,
            'show_protocol' => $protocol,
            'course_protocol_descr' => $request->course_protocol_descr,
            'learning_protocol_time' => $request->learning_protocol_time,
            'add_document' => json_encode($docs_arr),
            'video_name' =>  json_encode($video_name_arr),
            'video_length' => json_encode($video_lenght_arr),
            'video_file' =>  json_encode($video_file_arr),
            'video_link' => json_encode($video_link_arr),
            'model3d_link' => $request->model3d_link,
        ]);

        // Проверяем есть ли запрос на создание теста
        $redirect_to_test = $request->redirect_to_test;
        //dd($redirect_to_test);
        if(isset($redirect_to_test)){
            // Редиректим на создание теста
            return redirect()->route('new_test_info', ['course_id' => $course_id, 'courses_program_id' => $lesson_id ]);
        } else {
            // Редиректим на список курсов
            return redirect('courses_controll')->with(['message_success' => 'Курс успешно обновлен!', 'courses_program_id' => $courses_program_id]);
        }

    }

    // add_ lesson
    public function addLessonRedirect($course_id, Request $request){

        // Добавляем урок перед редиректом
        $this->add_lesson_apply($course_id, $request);
        $courses_program_id = session()->get('courses_program_id');
        //dd($courses_program_id);
        // Редиректим с айдишником
        return redirect()->route('new_test_info', ['course_id' => $course_id, 'courses_program_id' => $courses_program_id ]);
    }

    // public function add_lesson_edit_redirect($course_id, $lesson_id){

    //     //dd($course_id, $lesson_id, $request->all());
    //     //$courses_program_id = session()->get('courses_program_id');
    //     $courses_program_id = $lesson_id;
    //     //dd($courses_program_id);

    //     return redirect()->route('new_test_info', ['course_id' => $course_id, 'courses_program_id' => $courses_program_id ]);
    // }

    // add_question
    public function add_question($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        return view('courses.add_question', compact('course_info'));
    }
    // Добавление вопроса - применить
    public function add_question_apply($course_id, Request $request){

        // Получаем кол-во вопросов
        $q_counter = $request->questions_counter;
        // Для каждого вопроса
        for($i = 0; $i <= $q_counter; $i++){
            // Формируем название полей реквеста
            $c_course_question = 'course_question' . $i;
            $c_course_answer = 'course_answer' . $i;
            // И добавляем их в базу.
            DB::table('courses_faq')->insert([
                'course_id' => $course_id,
                'course_question' => $request->$c_course_question,
                'course_answer' => $request->$c_course_answer,
            ]);
        }
        // Возвращаем назад
        return \Redirect::route('edit_course', $course_id)->with('message', 'ПОШИРЕНІ ЗАПИТАННЯ ДОДАНІ'); 
        //return redirect()->back();
        //return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }

    public function edit_question($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        $faq_info = DB::table('courses_faq')->where('course_id', $course_id)->get();

        return view('courses.edit_question', compact('course_info', 'faq_info'));
    }

    public function edit_question_apply($course_id, Request $request){

        // Получаем кол-во вопросов
        $q_counter = $request->questions_counter;
        // Для каждого вопроса
        //dd($q_counter);
        for($i = 0; $i <= $q_counter; $i++){
            // Формируем название полей реквеста
            $c_course_question = 'course_question' . $i;
            $c_course_answer = 'course_answer' . $i;
            $c_course_id = 'qa_id' . $i;
            // И добавляем их в базу.
            //dd($request->all());
            if($request->$c_course_question != null && $request->$c_course_answer != null){

                $check_current = DB::table('courses_faq')->where('id', $request->$c_course_id)->first();

                if($check_current){
                    DB::table('courses_faq')->where('id',$check_current->id)->update([
                        'course_id' => $course_id,
                        'course_question' => $request->$c_course_question,
                        'course_answer' => $request->$c_course_answer,
                    ]); 
                } else {
                    DB::table('courses_faq')->insert([
                        'course_id' => $course_id,
                        'course_question' => $request->$c_course_question,
                        'course_answer' => $request->$c_course_answer,
                    ]); 
                }

                 

            }
            
        }
        // Возвращаем назад
        return \Redirect::route('edit_course', $course_id)->with('message', 'ПОШИРЕНІ ЗАПИТАННЯ ДОДАНІ'); 
    }


    public function delete_lesson($course_id, $lesson_id){

        //dd($course_id, $lesson_id);

        DB::table('courses_program')->where([
            'id' => $lesson_id,
            'course_id' => $course_id,
        ])->delete();

        return back();
    }
    // // Просмотр курса
    // public function course_view($course_id){

    //     dd($course_id);

    //     return view('courses.course_view', compact('course_id'));
    // }


}
