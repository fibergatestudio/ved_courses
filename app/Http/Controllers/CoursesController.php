<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CoursesController extends Controller
{
    public function index(){

        $courses = DB::table('courses')->get();
        
        //dd($courses);
        foreach($courses as $course){
            $creator = DB::table('users')->where('id', $course->creator_id)->first();
            $course->creator_name = $creator->name;
        }
        //dd($courses);

        return view('courses.index', compact('courses') );
    }

    public function new_course(){

        return view('courses.create_course');
    }

    
    public function create_course(Request $request){

        $all_info = $request->all();

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

        $teacher_arr = json_decode($course_info->assigned_teacher_id);
        //dd($teacher_arr);
        if($teacher_arr){
            $assigned_teachers =  DB::table('users')->whereIn('id', $teacher_arr)->get();
            $teachers = DB::table('users')->where('role', 'teacher')->whereNotIn('id', $teacher_arr)->get();
        } else {
            $assigned_teachers = [];
            $teachers = DB::table('users')->where('role', 'teacher')->get();
        }
        

        return view('courses.edit_course', compact('course_info', 'courses_question_answers', 'course_lessons', 'teachers', 'assigned_teachers') );
    }

    public function delete_teacher_course($course_id, $teacher_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();
        // Берем аррей учителей - декодим
        $teacher_arr = json_decode($course_info->assigned_teacher_id);

        // Убираем лишнее значение
        $new_arr = array_splice($teacher_arr, array_search($teacher_id, $teacher_arr ), 1);

        //dd($teacher_arr, $new_arr);

        DB::table('courses')->where('id', $course_id)->update([
            'assigned_teacher_id' => json_encode($teacher_arr),
        ]);


        
        return redirect()->back();
    }

    public function edit_course_apply($course_id, Request $request){

        //dd($request->visibility);

        $current_course = DB::table('courses')->where('id', $course_id)->first();
        //$tecaher_arr = json_encode()

        // $teachers_arr = [];
        // //dd($current_course->assigned_teacher_id);
        if($current_course->assigned_teacher_id){
            //array_push($teachers_arr, )
            $teacher_arr = json_decode($current_course->assigned_teacher_id);
            //dd($teachers_arr);
        } else {
            $teacher_arr = [];
        }

        //$teacher_arr = [];
        $t_id = $request->assigned_teacher_id;
        array_push($teacher_arr, $t_id);
        $teachers = json_encode($teacher_arr);
        //dd($teachers);

        DB::table('courses')->where('id',$course_id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'assigned_teacher_id' => $teachers,
        ]);

        return redirect()->back();
        //return redirect('courses_controll')->with('message_success', 'Курс успешно изменен!');
    }

    // edit_about
    public function edit_about($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        $course_i = DB::table('courses_information')->where('course_id', $course_id)->first();

        return view('courses.edit_about', compact('course_info', 'course_i'));
    }
    // edit_about_apply
    public function edit_about_apply($course_id, Request $request){

        //dd($request->all());
        // Делаем аррей из пунктов
        $courses_arr = json_encode($request->course_learn, JSON_UNESCAPED_UNICODE);
        
        // Берем информацию описания курса
        $about_check = DB::table('courses_information')->where('course_id', $course_id)->first();
        // Если инфа есть
        if(isset($about_check)){
            // Обновляем
            // dd("exist");
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

        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }
    // add_lesson
    public function add_lesson($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first(); 

        $courses_program = DB::table('courses_program')->where('course_id', $course_id)->get();
        //dd($courses_program);
        if(!$courses_program->isEmpty()){
            // Аррей айдишников тестов
            $test_ids_arr = [];
            // Берем все айди и заносим в аррей
            foreach($courses_program as $course_program){
                array_push($test_ids_arr, $course_program->test_id);
            }

            $course_tests = DB::table('tests_info')->where('id', $test_ids_arr)->get();
        } else {
            $course_tests = [];
        }

        //dd($tests);


        return view('courses.add_lesson', compact('course_info', 'course_tests'));
    }
    // add_lesson_apply
    public function add_lesson_apply($course_id, Request $request){

        // Количество видео
        $video_counter = $request->videos_counter;
 
        // Арреи под инфу видео
        $video_name_arr = [];
        $video_lenght_arr = [];
        $video_file_arr = [];
        $vido_link_arr = [];

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
                $filename = "";
            }

            $video_link = $request->$r_video_link;
            // Заносим информацию в аррей
            array_push($video_name_arr, $video_name);
            array_push($video_lenght_arr, $video_length);
            array_push($video_file_arr, $filename);
            array_push($vido_link_arr, $video_link);
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
                $filename = time().'.'.request()->$r_add_document->getClientOriginalExtension();
                request()->$r_add_document->move(public_path('docs'), $filename);
            }else{
                $filename = "no doc";
            }
            // Передача инфы в аррей
            array_push($docs_arr, $filename);
        }

        // Инсерт в базу
        DB::table('courses_program')->insert([
            'course_id' => $course_id,
            'course_description' => $request->course_description,
            'learning_time' => $request->learning_time,
            'course_protocol_descr' => $request->course_protocol_descr,
            'learning_protocol_time' => $request->learning_protocol_time,
            'add_document' => json_encode($docs_arr),
            'video_name' =>  json_encode($video_name_arr),
            'video_length' => json_encode($video_lenght_arr),
            'video_file' =>  json_encode($video_file_arr),
            'video_link' => json_encode($vido_link_arr),
        ]);
        
        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }
    // add_ lesson
    public function addLessonRedirect($course_id, Request $request){

        // Добавляем урок перед редиректом
        $this->add_lesson_apply($course_id, $request);

        // Редиректим с айдишником
        return redirect()->route('new_test_info', ['course_id' => $course_id]);
    }

    // add_question
    public function add_question($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        return view('courses.add_question', compact('course_info'));
    }
    // add_question_apply
    public function add_question_apply($course_id, Request $request){

        //dd($request->all());

        $q_counter = $request->questions_counter;

        for($i = 0; $i <= $q_counter; $i++){
            //echo $i;
            $c_course_question = 'course_question' . $i;
            $c_course_answer = 'course_answer' . $i;
            //dd($c_course_question);
            DB::table('courses_faq')->insert([
                'course_id' => $course_id,
                'course_question' => $request->$c_course_question,
                'course_answer' => $request->$c_course_answer,
            ]);
        }

        // DB::table('courses_faq')->insert([
        //     'course_id' => $course_id,
        //     'course_question' => $request->course_question,
        //     'course_answer' => $request->course_answer,
        // ]);

        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }

    // // Просмотр курса
    // public function course_view($course_id){

    //     dd($course_id);

    //     return view('courses.course_view', compact('course_id')); 
    // }


}
