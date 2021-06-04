<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Courses;
use App\User;
use App\CourseViews;
use App\CoursesFaq;
use App\CoursesProgram;
use App\Teachers;
use App\CoursesInformation;
use App\TestsInfo;

class CoursesController extends Controller
{
    // Индекс
    public function index(){

        // Получаем все курсы
        $courses = Courses::get();

        // Перебираем курсы 
        foreach($courses as $course){
            // Получаем имя создателя
            $creator = User::where('id', $course->creator_id)->first();
            $course->creator_name = $creator->name;
            // Получаем кол-во просмотров курса
            $course_views = CourseViews::where('course_name', $course->name)->count();
            if($course_views){
                $course->views = $course_views;
            } else {
                $course->views = 0;
            }
            //для превью обрезаем тэги
            $clear_descr = str_replace("&nbsp;", '', $course->description);
            $course->description =  strip_tags($clear_descr);
        }

        return view('courses.index', compact('courses') );
    }

    // Страница всех курсов
    public function all_courses(){

        // Получаем все курсы
        $courses = Courses::get();

        // Перебираем курсы 
        foreach($courses as $course){
            // Получаем имя создателя
            $creator = User::where('id', $course->creator_id)->first();
            $course->creator_name = $creator->name;
            // Получаем кол-во просмотров курса
            $course_views = CourseViews::where('course_name', $course->name)->count();
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

        return view('courses.all_courses', compact('courses') );
    }

    // Страница создания курса
    public function new_course(){

        return view('courses.create_course');
    }

    // Создаем курс POST
    public function create_course(Request $request){

        // Получаем всю инфу с запроса
        $all_info = $request->all();

        // Проверяем есть ли изображение
        if($request->hasFile('course_image')){
            $filename = time().'.'.request()->course_image->getClientOriginalExtension();
            request()->course_image->move(public_path('images'), $filename);
        }else{
            $filename = "";
        }

        // Инсертим в базу
        Courses::insert([
            'name' => $request->name,
            'description' => $request->description,
            'course_image_path' => $filename,
            'creator_id' => Auth::user()->id,
            'visibility' => 'all',
        ]);

        return redirect('courses_controll')->with('message_success', 'Курс успешно создан!');
    }

    // Редактирование курса
    public function edit_course($course_id){

        // Получаем текущий курс
        $course_info = Courses::where('id', $course_id)->first();

        // Получаем FAQ
        $courses_question_answers = CoursesFaq::where('course_id', $course_id)->get();

        // Получаем программу курса
        $course_lessons = CoursesProgram::where('course_id', $course_id)->get();

        // Перебираем уроки курса
        foreach($course_lessons as $lesson){

            // Берем кол-во видео + проверка
            if($lesson->video_name == null || $lesson->video_name == "null" ){
                $lesson->video_count = 0;
            } else {
                $lesson->video_count = count(json_decode($lesson->video_name));
            }

            $video_arr = [];
            $i = 0;
            // Заносим видео в аррей
            if($lesson->video_name != "[]" && $lesson->video_name != ""){
                foreach(json_decode($lesson->video_name) as $video){
                    $video_arr[$i]["video_name"] = $video;
                    $i++;
                }
            }
            // Заносим продолжительность видео в аррей
            if($lesson->video_length != "[]" && $lesson->video_length != ""){
                $a = 0;
                foreach(json_decode($lesson->video_length) as $video_l){
                    $video_arr[$a]["video_length"] = $video_l;
                    $a++;
                }
            }

            $lesson->video_arr = $video_arr;

        }

        // Декодим подвязанных учитилей
        $teacher_arr = json_decode($course_info->assigned_teacher_id);
        // Получаем инфу учитилей
        if($teacher_arr){
            $assigned_teachers =  User::whereIn('id', $teacher_arr)->get();
            $teachers = User::where('role', 'teacher')->whereNotIn('id', $teacher_arr)->get();

            foreach($assigned_teachers as $teacher){
                $t_descr = Teachers::where('user_id', $teacher->id)->first();
                if(isset($t_descr->descr)){
                    $teacher->descr = $t_descr->descr;
                } else {
                    $teacher->descr = "";
                }
            }
        } else {
            $assigned_teachers = [];
            $teachers = User::where('role', 'teacher')->get();
        }
        // Получаем информацию курса
        $course_information = CoursesInformation::where('course_id', $course_id)->first();

        return view('courses.edit_course', compact('course_info', 'courses_question_answers', 'course_lessons', 'teachers', 'assigned_teachers', 'course_information') );
    }

    // Удаление курса
    public function delete_course($course_id){

        // Удаляем курс и всю доп. инфу.
        Courses::where('id', $course_id)->delete();
        CoursesFaq::where('course_id', $course_id)->delete();
        CoursesInformation::where('course_id', $course_id)->delete();
        CoursesProgram::where('course_id', $course_id)->delete();

        return back();
    }

    // Удаляем учителя с курса
    public function delete_teacher_course($course_id, $teacher_id){

        // Получаем инфу курса
        $course_info = Courses::where('id', $course_id)->first();
        // Декодим аррей с учителями
        $teacher_arr = json_decode($course_info->assigned_teacher_id);

        // Убираем лишнее значение
        $new_arr = array_splice($teacher_arr, array_search($teacher_id, $teacher_arr ), 1);

        // Обновляем курс
        Courses::where('id', $course_id)->update([
            'assigned_teacher_id' => json_encode($teacher_arr),
        ]);

        return redirect()->back();
    }

    // Удаляем фотографию курса
    public function delete_photo($course_id){

        Courses::where('id',$course_id)->update([
            'course_image_path' => null,
        ]);

        return back();
    }

    // Применяем редактирование курса
    public function edit_course_apply($course_id, Request $request){

        // Таблица курсов
        $current_course = Courses::where('id', $course_id)->first();

        // Получаем картинку // Если картинка есть
        if($request->hasFile('course_image')){
            $filename = time().'.'.request()->course_image->getClientOriginalExtension();
            request()->course_image->move(public_path('images'), $filename);

            // Обновляем картинку в базе
            Courses::where('id',$course_id)->update([
                'course_image_path' => $filename,
            ]);
        }
        // Проверяем есть ли учитель у курса
        if($current_course->assigned_teacher_id){
            // Если есть - декодим аррей
            $teacher_arr = json_decode($current_course->assigned_teacher_id);
        } else {
            $teacher_arr = [];
        }

        // Получаем айди учителя с запроса
        $t_id = $request->assigned_teacher_id;
        if($t_id != "Выберите"){
            array_push($teacher_arr, $t_id);
            $teachers = json_encode($teacher_arr);
        } else {
            $teachers = $teacher_arr;
        }

        // Обновляем курс
        Courses::where('id',$course_id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'assigned_teacher_id' => $teachers,
        ]);

        return redirect()->back();
    }

    // Аджакс запрос на удаление учителя
    public function ajax_remove_teacher(Request $request){

        // Получаем айди курса с запроса
        $course_id = $request->course_id;
        // Декодим учитилей с запроса
        $teachers = json_encode($request->teachers);
        // Обновляем учитилей в курсе
        Courses::where('id', $course_id)->update([
            'assigned_teacher_id' => $teachers,
        ]);

        echo 'Teachers updated';
    }

    // Редактирование описания Страница
    public function edit_about($course_id){

        // Получаем данные курса
        $course_info = Courses::where('id', $course_id)->first();
        // Получаем информацию курса
        $course_i = CoursesInformation::where('course_id', $course_id)->first();

        return view('courses.edit_about', compact('course_info', 'course_i'));
    }

    // Применяем редактирование описания
    public function edit_about_apply($course_id, Request $request){

        // Получаем кол-во вопросов
        $q_c = $request->questions_counter;

        // Формируем неймы для запросов и заносим в аррей
        $course_lrn_arr = [];
        for($i = 1; $i <= $q_c; $i++){
            $c = "course_learn" . $i;
            array_push($course_lrn_arr, $request->$c);
        }

        // Енкодим аррей с запросами
        $courses_arr = json_encode($course_lrn_arr, JSON_UNESCAPED_UNICODE);

        // Берем информацию описания курса
        $about_check = CoursesInformation::where('course_id', $course_id)->first();
        // Если инфа есть
        if(isset($about_check)){
            // Обновляем
            CoursesInformation::where('course_id', $course_id)->update([
                'course_description' => $request->course_description,
                'course_learn_arr' => $courses_arr,
            ]);
        } else {
            // Если нет, создаем
            CoursesInformation::insert([
                'course_id' => $course_id,
                'course_description' => $request->course_description,
                'course_learn_arr' => $courses_arr,
            ]);
        }

        return \Redirect::route('edit_course', $course_id)->with('message', 'ІНФОРМАЦІЯ ПРО КУРС ОНОВЛЕНА');
    }

    // Добавить урок Страница
    public function add_lesson($course_id){

        // Получаем инфу курса
        $course_info = Courses::where('id', $course_id)->first();
        // Получаем программу курса
        $courses_program = CoursesProgram::where('course_id', $course_id)->get();
        $course_tests = [];

        return view('courses.add_lesson', compact('course_info', 'course_tests'));
    }

    // Добавить урок POST
    public function add_lesson_apply($course_id, Request $request){

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
                // Если все поля пустые
            if($video_name == null && $video_length == null && $filename == null && $video_link == null ){
                // Ничего не добавляем что бы не делать дублей пустых
            } else {
                // Если что-то из этого есть - продолжаем передавить инфу в арреи
                if($video_name == null){ array_push($video_name_arr, null); } else { array_push($video_name_arr, $video_name); }
                if($video_length == null){ array_push($video_lenght_arr, null); } else { array_push($video_lenght_arr, $video_length); }
                if($filename == null){ array_push($video_file_arr, null); } else { array_push($video_file_arr, $filename); }
                if($video_link == null){ array_push($video_link_arr, null); } else { array_push($video_link_arr, $video_link); }
            }
        }

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
                $filename_doc = time().$a.'.'.request()->$r_add_document->getClientOriginalExtension();
                //dd($filename_doc);
                request()->$r_add_document->move(public_path('docs'), $filename_doc);
            }else{
                $filename_doc = null;
            }
            // Передача инфы в аррей
            if($filename_doc == null){ $docs_arr = null; } else { array_push($docs_arr, $filename_doc); }
        }

        // Показать протокол
        if($request->show_protocol){
            $protocol = $request->show_protocol;
        } else {
            $protocol = false;
        }

        // Инсерт в базу
        $courses_program_id = CoursesProgram::insertGetId([
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

        if(isset($redirect_to_test)){
            // Редиректим на создание теста
            return redirect()->route('new_test_info', ['course_id' => $course_id, 'courses_program_id' => $courses_program_id ]);
        } else {
            // Редиректим на список курсов
            return redirect('courses_controll')->with(['message_success' => 'Курс успешно обновлен!', 'courses_program_id' => $courses_program_id]);
        }

    }

    // Редактирование урока Страница
    public function edit_lesson($course_id, $lesson_id){

        // Получаем инфу курса
        $course_info = Courses::where('id', $course_id)->first();
        // Получаем программу курса
        $courses_program = CoursesProgram::where('course_id', $course_id)->get();
        $course_tests_id = CoursesProgram::where([
            'id' => $lesson_id,
            'course_id' => $course_id
        ])->first();
        // Получаем инфу тестов
        $course_tests = TestsInfo::where('id', $course_tests_id->test_id)->get();
        // Получаем инфо урока
        $lesson_info = CoursesProgram::where('id', $lesson_id)->first();

        return view('courses.edit_lesson', compact('course_info', 'course_tests', 'lesson_info'));

    }

    // Редактирование урока POST
    public function edit_lesson_apply($course_id, $lesson_id, Request $request){

        // Получаем кол-во видео
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

            // Получаем файл видео
            // Если в запросе есть файл
            if($request->file($r_video_file)){
                // Формируем имя файла
                $filename = time().$i.'.'.request()->$r_video_file->getClientOriginalExtension();
                // Перемещаем файл
                request()->$r_video_file->move(public_path('video_files'), $filename);
            }else{
                // Если в запросе нет файла
                $filename = null;
                $r_add_video_name = 'video_file_name' . $i;
                // Проверка есть ли старео видео
                $old_video_name = $request->$r_add_video_name;
                // Если видео есть - заносим в аррей
                if($old_video_name != null){
                    array_push($old_video_names, $old_video_name);
                }
            }
            // Проверка если ли ссылка видео
            $video_link = $request->$r_video_link;
            // Заносим информацию в аррей
                // Если все поля пустые
            if($video_name == null && $video_length == null && $filename == null && $video_link == null ){
                // Ничего не добавляем что бы не делать дублей пустых
            } else {
                // Если что-то из этого есть - продолжаем передавить инфу в арреи
                if($video_name == null){  array_push($video_name_arr, null); } else { array_push($video_name_arr, $video_name); }
                if($video_length == null){  array_push($video_lenght_arr, null); } else { array_push($video_lenght_arr, $video_length); }
                if($filename == null){  array_push($video_file_arr, null); } else { array_push($video_file_arr, $filename); }
                if($video_link == null){  array_push($video_link_arr, null); } else { array_push($video_link_arr, $video_link); }
            }
          
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
                $filename_doc = time().$a.'.'.request()->$r_add_document->getClientOriginalExtension();
                request()->$r_add_document->move(public_path('docs'), $filename_doc);
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

        // Мерджим старые и новые имена
        $docs_arr = array_merge($docs_arr, $docs_names_arr);

        // Показать протокол
        if($request->show_protocol){
            $protocol = $request->show_protocol;
        } else {
            $protocol = false;
        }

        // Инсерт в базу
        $courses_program_id = CoursesProgram::where('id', $lesson_id)->update([
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

        if(isset($redirect_to_test)){
            // Редиректим на создание теста
            return redirect()->route('new_test_info', ['course_id' => $course_id, 'courses_program_id' => $lesson_id ]);
        } else {
            return \Redirect::route('edit_course', $course_id)->with('message', 'Заняття успішно змінено'); 
        }

    }

    // Добавить урок редирект
    public function addLessonRedirect($course_id, Request $request){

        // Добавляем урок перед редиректом
        $this->add_lesson_apply($course_id, $request);
        $courses_program_id = session()->get('courses_program_id');

        // Редиректим с айдишником
        return redirect()->route('new_test_info', ['course_id' => $course_id, 'courses_program_id' => $courses_program_id ]);
    }


    // Добавить вопрос Страница
    public function add_question($course_id){

        $course_info = Courses::where('id', $course_id)->first();

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
            CoursesFaq::insert([
                'course_id' => $course_id,
                'course_question' => $request->$c_course_question,
                'course_answer' => $request->$c_course_answer,
            ]);
        }
        // Возвращаем назад
        return \Redirect::route('edit_course', $course_id)->with('message', 'ПОШИРЕНІ ЗАПИТАННЯ ДОДАНІ'); 
    }

    // Редактирование вопроса Страница
    public function edit_question($course_id){

        $course_info = Courses::where('id', $course_id)->first();

        $faq_info = CoursesFaq::where('course_id', $course_id)->get();

        return view('courses.edit_question', compact('course_info', 'faq_info'));
    }

    // Редактирование вопроса POST
    public function edit_question_apply($course_id, Request $request){

        // Получаем кол-во вопросов
        $q_counter = $request->questions_counter;

        // Для каждого вопроса
        for($i = 0; $i <= $q_counter; $i++){
            // Формируем название полей реквеста
            $c_course_question = 'course_question' . $i;
            $c_course_answer = 'course_answer' . $i;
            $c_course_id = 'qa_id' . $i;

            // И добавляем их в базу.
            if($request->$c_course_question != null && $request->$c_course_answer != null){

                $check_current = CoursesFaq::where('id', $request->$c_course_id)->first();

                if($check_current){
                    CoursesFaq::where('id',$check_current->id)->update([
                        'course_id' => $course_id,
                        'course_question' => $request->$c_course_question,
                        'course_answer' => $request->$c_course_answer,
                    ]); 
                } else {
                    CoursesFaq::insert([
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

    // Удалить вопрос
    public function delete_question(){

        $question_id = request()->question_id;
        CoursesFaq::where([
            'id' => $question_id,
            ])->delete(); 

        return back();
    }

    // Удаление урока
    public function delete_lesson($course_id, $lesson_id){

        CoursesProgram::where([
            'id' => $lesson_id,
            'course_id' => $course_id,
        ])->delete();

        return back();
    }

    // Возвращаем популярные курсы
    public function popular_course(Request $request){

        if ($request->popular === 'true') {
            Courses::where('id',$request->course_id)->update([
                'popularity' => 'popular'
            ]);
        }
        else if($request->popular === 'false'){
            Courses::where('id',$request->course_id)->update([
                'popularity' => null
            ]);
        }

        return $request->course_id;
    }


}
