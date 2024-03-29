<?php

namespace App\Http\Controllers;

use App\User;
use App\CourseViews;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\CoursesProgram;
use App\CoursesInformation;
use App\Groups;
use App\Students;
use App\Courses;
use App\TestsInfo;
use App\FinishedTestsInfo;
use App\Protocols;
use App\CoursesFaq;
use App\TestsQuestions;

use App\TestsMultipleChoice;
use App\TestsTrueFalse;
use App\TestsDragDrop;
use App\TestsLog;
use App\TestTime;

class HomePageController extends Controller
{

    public function welcome(){

        $courses = Courses::get();

        return view('front.main', compact('courses'));
    }

    public function about()
    {
        return view('front.simulatorBig');
    }

    public function simulator()
    {
        return view('front.simulator');
    }

    public function student_courses_main()
    {
        $courses = Courses::get();
        return view('front.student_courses_main', compact('courses'));
    }

    public function student_courses()
    {
        $user_id = Auth::user()->id;
        $student = Students::where('user_id', $user_id)->first();
        $course = Courses::where('name', $student->course_number)->first();

        return view('front.student_courses', compact('course', 'user_id'));
    }

    public function success_for_student($course_id, $student_id)
    { 
        $course_info = Courses::where('id', $course_id)->first();
        $courses_program = CoursesProgram::where('course_id', $course_id)->get();

        foreach($courses_program as $course_program){
            $course_test_info = FinishedTestsInfo::where([
                'user_id' => $student_id,
                'test_id' => $course_program->test_id,
                'course_id' => $course_id,
            ])->orderBy('total_score', 'desc')->first();
            //dd($course_test_info);
            $course_program->finished_test_info = $course_test_info;
        }


        $student = Students::where('user_id', $student_id)->first();
        $email = User::where('id', $student_id)->first()->email;
        $student->email = $email;

        $course_id = null;
        $course_lessons = (object)[];
        $lesson_count = null;
        $course_info = Courses::where('name', $student->course_number)->first();
        if (is_object($course_info)) {
            $course_id = $course_info->id;
        }

        // Программа курса
        if ($course_id) {
            $course_lessons = CoursesProgram::where('course_id', $course_id)->get();
            $lesson_count = $course_lessons->count();
        }

        // Видео для курса
        foreach($course_lessons as $lesson){
            if($lesson->video_name == null || $lesson->video_name == "null" ){
                $lesson->video_count = 0;
            } else {
                $lesson->video_count = count(json_decode($lesson->video_name));
            }


            // Результаты теста по курсу
            if($lesson->test_id != null){
                $lesson->test_exist = true;
                // Берем инфу о законченных тестах
                    //TEST $finished_test_info_t = FinishedTestsInfo::where(['user_id' => $student_id, 'test_id' => $lesson->test_id, 'course_id' => $course_id, ])->orderBy('total_score', 'desc')->first();
                    $finished_test_info_t = FinishedTestsInfo::where([
                        'user_id' => $student_id,
                        'test_id' => $lesson->test_id,
                        'course_id' => $course_id,
                    ])->orderBy('total_score', 'desc')->get();
                    $max_score = 0;
                    foreach($finished_test_info_t as $test_info){
                        $test_info->total_score = intval($test_info->total_score);
                        if($max_score <= $test_info->total_score){
                            $max_score = $test_info->total_score;
                        } 
                    }
                        // ENDTEST
                    $finished_test_info = FinishedTestsInfo::where([
                        'user_id' => $student_id,
                        'test_id' => $lesson->test_id,
                        'course_id' => $course_id,
                        'total_score' => $max_score,
                    ])->first();
                //dd($finished_test_info);
                // Аррей с инфой о результатах
                $test_results = [];
                // Проверяем есть ли результаты
                if($finished_test_info){
                    // Если есть - берем нужную информацию и передаем в аррей
                    $test_results_decode = json_decode($finished_test_info->test_questions_json);
                    $test_results['max_score'] = $test_results_decode->max_score;
                    $test_results['final_score'] = $test_results_decode->final_score;
                    $test_results['completion_percent'] = abs(
                        floor(
                            ( ( ($test_results['max_score'] - $test_results['final_score']) / ($test_results['max_score']) ) * 100 ) - 100
                        )
                    );
                }
                // По результатам - передаем инфу в общий аррей урока
                $lesson->test_results = $test_results;

                $test_info = TestsInfo::where('id', $lesson->test_id)->first();
                $lesson->test_info = $test_info;
                //dd($finished_test_info);
            } else {
                $lesson->test_exist = false;
                $lesson->test_results = [];
            }
        }

        $course_protocols = [];
        //Протоколы для курса
        foreach($course_lessons as $lesson){
            $current_protocol = Protocols::where([
                                                            ['course_id', '=', $course_id],
                                                            ['lesson_id', '=', $lesson->id],
                                                            ['user_id', '=', $student_id],
                                                        ])->first();
            if($lesson->show_protocol) {
                array_push($course_protocols, $current_protocol);
            }
            else {
                array_push($course_protocols, null);
            }
        }

        

        return view('front.success_for_student', compact('courses_program', 'course_lessons', 'course_info', 'course_protocols', 'lesson_count'));
    }

    public function student_courses_ended()
    {
        return view('front.student_courses_ended');
    }

    public function student_profile()
    {
        $student_id = Auth::user()->id;
        $student_info = User::where('id', $student_id)->first();
        $student_full_info = Students::where('user_id', $student_id)->first();
        $student_info->full_name = trim($student_info->surname . ' ' . $student_info->name . ' ' . $student_info->patronymic);
        return view('front.student_profile', compact('student_info', 'student_full_info'));
    }

    public function view_course($course_id, $tab = null) {
        $user = Auth::user();
        $course = Courses::where('id', $course_id)->first();
        $course_information = CoursesInformation::where('course_id', $course_id)->first();
        $course_lessons = CoursesProgram::where('course_id', $course_id)->orderBy('id')->get();
        $course_faq = CoursesFaq::where('course_id', $course_id)->orderBy('id')->get();

        // Добавляем просмотр курса
        //$check_dup_ip = CourseViews::where('ip', \Request::getClientIp() )->first();
        //if(!$check_dup){
        $course_view = CourseViews::createViewLog($course);
        //}

        // end

        if (is_null($course)) {
            abort(404);
        }
        if ($course->assigned_teacher_id) {
            $course_teachers = User::join('teachers', 'users.id', '=', 'teachers.user_id')
            //->leftJoin('media', 'media.model_id' , '=', 'teachers.user_id')
            ->whereIn('users.id', json_decode($course->assigned_teacher_id))
            ->get();
        } else {
            $course_teachers = collect(null);
        }
        switch ($tab) {
        case 'teachers':
            return view('front.teachers', compact('course', 'course_information', 'course_teachers'));
            break;
        case 'program':
            return view('front.program', compact('course', 'course_information', 'course_lessons'));
            break;
        case 'faq':
            return view('front.questions', compact('course', 'course_information', 'course_faq'));
            break;
        default:
            return view('front.aboute_course', compact('course', 'course_information'));
            break;
        }

    }

    public function view_lesson($course_id, $lesson_id = null, $tab = null) {
        $user = Auth::user();

        $course = Courses::where('id', $course_id)->first();

        $course_information = CoursesInformation::where('course_id', $course_id)->first();

        if (is_null($course)) {
            abort(404);
        }
        if (isset($lesson_id)) {
            $lesson = CoursesProgram::where([['course_id', '=', $course_id], ['id', '=', $lesson_id]])->first();
            $prevLesson = CoursesProgram::where([['course_id', '=', $course->id], ['id', '<', $lesson->id]])->orderBy('id','desc')->first();
            $nextLesson = CoursesProgram::where([['course_id', '=', $course->id], ['id', '>', $lesson->id]])->first();
            $lessonNumber = CoursesProgram::where('course_id', '=', $course->id)->count() - CoursesProgram::where([['course_id', '=', $course->id], ['id', '>', $lesson->id]])->count();
        } else {
            $lesson = CoursesProgram::where('course_id', '=', $course_id)->orderBy('id','asc')->first();
        }

        if (is_null($lesson)) {
            abort(404);
        }

        if (is_null($user)) {
            $first_lesson_in_course = CoursesProgram::where('course_id', '=', $course_id)->orderBy('id','asc')->first();
            if ($lesson->id > $first_lesson_in_course->id) {
               return view('front.guest');
            }
        }

        // Тесты
        $test_id = CoursesProgram::where([
            'id' => $lesson_id,
            'course_id' => $course_id,
            ])->first();
        //dd("Course_id: " . $course_id . "Lesson_id: " . $lesson_id);
        if(isset($test_id->id)){
            $testInfo = TestsInfo::where('id', $test_id->test_id)->first();
        }
            // Вопросы теста
            if(isset($testInfo)){
                $testQuestions = TestsQuestions::where('test_id', $testInfo->id)->get();
                //dd($testQuestions);
                $testMultiplyIDS = [];
                $testTrueFalseIDS = [];
                $testDragDropIDS = [];
                foreach($testQuestions as $testQuest){
                    if($testQuest->question_type == "Множинний вибір"){
                        //$testMultiplyOne = TestsMultipleChoice::where('id', $testQuest->test_answers_id)->first();
                        array_push($testMultiplyIDS, $testQuest->test_answers_id);
                        //dd($testMultiply);
                    } else { $testMultiplyOne = ""; }
                    if($testQuest->question_type == "Правильно/неправильно"){
                        array_push($testTrueFalseIDS, $testQuest->test_answers_id);
                        //dd($testTrueFalse);
                    } else { $testTrueFalseOne = ""; }
                    if($testQuest->question_type == "Перетягування в тексті"){
                        array_push($testDragDropIDS, $testQuest->test_answers_id);
                        //dd($testDragDrop);
                    } else { $testDragDropOne = ""; }

                }
                //dd($testInfo->operating_mode);
                if($testInfo->operating_mode != '0'){

                    $group_students = Groups::where('id', $testInfo->operating_mode)->first();

                    $access_list = json_decode($group_students->students_array);

                    $user_id = Auth::user()->id;

                    if(Auth::user()->role == "admin" || Auth::user()->role == "teacher"){
                        $testInfo->test_access = true;
                    } else if( Auth::user()->role == "student" && in_array($user_id, $access_list) ) {
                        $testInfo->test_access = true;
                    } else {
                        $testInfo->test_access = false;
                    }
                    //dd($testInfo->test_access);

                } else {
                    $testInfo->test_access = true;
                }
                $testMultiply = TestsMultipleChoice::whereIn('id', $testMultiplyIDS)->get();
                $testTrueFalse = TestsTrueFalse::whereIn('id', $testTrueFalseIDS)->get();
                $testDragDrop = TestsDragDrop::whereIn('id', $testDragDropIDS)->get();

                // Макс попыток
                $max_tries = 3;
                // Получаем кол-во пройденых раз
                $current_tries = TestsLog::where(['user_id' => $user->id, 'test_id' => $test_id->id])->get();
                $current_tries_count = count($current_tries);
                //dd( $current_tries_count);
                // Кол-во оставшихся попытк
                if($current_tries_count >= $max_tries){
                    $testInfo->expired_tries = true;
                } else {
                    $testInfo->expired_tries = false;
                }

            }
 
        switch ($tab) {
        case 'strings':
            return view('front.strings', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            break;
        case 'video':
            return view('front.video_collection', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            break;
        case 'model':
                return view('front.model', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
                break;
        case 'protocol':
            if ($lesson->show_protocol) {
                return view('front.protocol', compact('course', 'lesson', 'user', 'lessonNumber', 'prevLesson', 'nextLesson'));
            }
            else {
                return redirect()->route('view_lesson', ['course_id' => $course_id, 'lesson_id' => $lesson_id]);
            }
            break;
        case 'test':
            if(isset($testInfo)){

                // Проверяем есть ли уже счетки времени теста
                $test_time_check = TestTime::where([
                    'user_id' => $user->id,
                    'test_id' => $testInfo->id,
                    'course_id' => $course_id,
                ])->first();
                
                // Если есть проверяем не вышло ли время
                if($test_time_check){
                    // Текущее время
                    $current_time =  Carbon::now();
                    // Время начала
                    $started_time = $test_time_check->start_time;
                    // Получаем разницу в часах
                    $hours_diff = $current_time->diffInHours($started_time);

                    // Если разинца 2 часа или больше
                    if($hours_diff >= 2){
                        // Обновляем статус времени
                        TestTime::where(['id' => $test_time_check->id, 'status' => 'active'])->update([
                            'status' => 'inactive',
                        ]);
                        // Перисваеваем значение времени - просрочено
                        $testInfo->expired_time = true;
                    } else {
                        // Перисваеваем значение времени - не просрочено
                        $testInfo->expired_time = false;
                    }
                // Если нет времени теста - создаем
                } else {
                    // 
                    $testInfo->expired_time = false;
                    // Создаем запись с началом времени теста
                    TestTime::insert([
                        'user_id' => $user->id,
                        'test_id' => $testInfo->id,
                        'course_id' => $course_id,
                        'start_time' => Carbon::now(),
                        'status' => 'active',
                    ]);
                }
                

            return view('front.test', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson', 'testInfo', 'testDragDrop', 'testMultiply', 'testTrueFalse', 'testQuestions'));
            } else {
                return view('front.test', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            }
            break;
        default:
            return view('front.strings', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));;
            break;
        }
    }

    public function send_test($test_id, $course_id, $lesson_id, Request $request){

        // Получаем всю POST инфу
        $all_info = $request->all();
        //dd($all_info);
        $user_id = Auth::user()->id;
        // Аррей всех ответов
        $test_questions_json = [];

        // Получаем айди тестов и делае арреи
            //Тру фолс
        $true_false_ids = $request->true_false_id;
        $true_false_q = [];
            // Множественный
        $multiply_ids = $request->multiply_id;
        $multiply_q = [];
            // Перетаскивание
        $drag_drop_ids = $request->drag_drop_id;
        $drag_drop_q = [];
        // Получаем инфу о тесте (берем макс оценку)
        $test_info = TestsInfo::where('id', $test_id)->first();

        $test_questions_json['max_score'] = 0;
        // Создаем финальную оценку
        $test_questions_json['final_score'] = 0;

        // Макс попыток
        $max_tries = 3;
        // Получаем кол-во пройденых раз
        $current_tries = TestsLog::where(['user_id' => $user_id, 'test_id' => $course_id])->get();
        $current_tries_count = count($current_tries) + 1;

        // Кол-во оставшихся попытк
        if($current_tries_count >= $max_tries){
            $test_questions_json['tries_left'] = 0; 
        } else {

            $test_questions_json['tries_left'] = $max_tries - $current_tries_count;
        }

        // Кол-во вопросов
        $q_num = 0;
        // Подсчет
        if(isset($true_false_ids)){
            foreach($true_false_ids as $key=>$true_false_id){$q_num++;}
        }
        if(isset($multiply_ids)){
            foreach($multiply_ids as $key=>$multiply_id){$q_num++;}
        }
        if(isset($drag_drop_ids)){
            foreach($drag_drop_ids as $key=>$drag_drop_id){$q_num++;}
        }

        // Верно \ не верно
        // Перебираем и берем данные о них с базы
        if(isset($true_false_ids)){
            foreach($true_false_ids as $key=>$true_false_id){
                $tf_array = [];
                // Строка с базы
                $true_false_db = TestsTrueFalse::where('id', $true_false_id)->first();
                $tf_array['question_id'] = $true_false_id;
                $tf_array['question_type'] = "Правильно/неправильно";
                $tf_array['question_text'] = $true_false_db->question_text;
                $test_questions_json['max_score'] = $test_questions_json['max_score'] + $true_false_db->default_score;
                // Текущий ответы
                $current_answers = $request->answer_truefalse;
                //dd($current_answers, count($true_false_ids));
                if(isset($current_answers[$key])){
                    $tf_array['selected_answer'] = $current_answers[$key];
                } 
                //$tf_array['selected_answer'] = $current_answers[$key];
                // Верный ответ
                $right_answer = $true_false_db->right_answer;
                $tf_array['right_answer'] = $right_answer;
                //dd($request->all());
                // Проверяем верно ли ответил
                if(isset($current_answers[$key]) && $current_answers[$key] == $right_answer){
                    // Ответил верно
                    $tf_array['answered_right'] = "Так";
                    //$test_questions_json['final_score'] = $test_questions_json['final_score'] + $grade_per_quest;
                    $test_questions_json['final_score'] = $test_questions_json['final_score'] + $true_false_db->default_score;
                } else {
                    // Ответил не верно
                    $tf_array['answered_right'] = "Ні";
                }
                array_push($true_false_q, $tf_array);
            }

            array_push($test_questions_json, $true_false_q);
        }
        
        // Множественный выбор
        if(isset($multiply_ids)){
            foreach($multiply_ids as $key=>$multiply_id){
                $multi_array = [];
                // Строка с базы
                $multiply_db = TestsMultipleChoice::where('id', $multiply_id)->first();
                // Макс оценка за тест
                $max_multi_grade = $multiply_db->default_score;
                // Текущая оценка за тест
                $curr_multi_grade = 0;
                //
                $multi_array['question_id'] = $multiply_id;
                $multi_array['question_type'] = "Множинний вибір";
                $multi_array['question_text'] = $multiply_db->question_text;
                $test_questions_json['max_score'] = $test_questions_json['max_score'] + $multiply_db->default_score;
                // Текущий выбранный ответ
                $request_name = 'question_' . $multiply_id;
                // Получаем текущие ответы на тест
                $current_answers = $request->$request_name;
                // Декодим ответы
                $answers_json = json_decode($multiply_db->answers_json);

                foreach($answers_json as $answer_info){
                    // Проверяем если ответ не пустой и если ответ есть в арррее
                    if($current_answers != null && in_array($answer_info->answer, $current_answers)){
                        // Если оценка +вая - то добавляем 
                        if($answer_info->answer_plusminus == "+"){
                            $curr_multi_grade = $curr_multi_grade + round($this->get_percentage($max_multi_grade, $answer_info->answer_grade), 1);
                        // Если оценка -вая - то отнимаем
                        } else if($answer_info->answer_plusminus == "-") {
                            $curr_multi_grade = $curr_multi_grade - round($this->get_percentage($max_multi_grade, $answer_info->answer_grade), 1);
                        }
                    } 

                    // Если оценка не указана - ставим 0
                    //dd($curr_multi_grade);
                    if($answer_info->answer){
                        $multi_array['answer_grade'] = $answer_info->answer_grade;
                        //$test_questions_json['final_score'] = $test_questions_json['final_score'] + ($grade_per_quest / 2);
                    } else {
                        $multi_array['answer_grade'] = 0;
                    }
                }
                //dd($curr_multi_grade);
                array_push($multiply_q, $multi_array);
                // Если значени оценки - минусовое - ставим 0
                if ($curr_multi_grade < 0) {
                    $curr_multi_grade = 0;
                }
                // Передаем оценки в общий счетчик
                $test_questions_json['final_score'] = $test_questions_json['final_score'] + $curr_multi_grade;
            }
            array_push($test_questions_json, $multiply_q);
        }

        // Петераскивание
        if(isset($drag_drop_ids)){
            // Перебираем и берем данные о них с базы
            foreach($drag_drop_ids as $key=>$drag_drop_id){
                $dd_array = [];
                // Строка с базы
                $drag_drop_db = TestsDragDrop::where('id', $drag_drop_id)->first();
                $dd_array['question_id'] = $drag_drop_id;
                $dd_array['question_type'] = "Перетягування в тексті";
                $dd_array['question_text'] = $drag_drop_db->question_text;
                $test_questions_json['max_score'] = $test_questions_json['max_score'] + $drag_drop_db->default_score;
                if(isset($drag_drop_db->default_score)){ $dd_array['max_score'] = $drag_drop_db->default_score; } else {  $dd_array['max_score'] = 0; }
                $dd_array['score'] = 0;
                // Текущий выбранный ответ
                $answer_drag_drop = 'answer_dragdrop' . $drag_drop_id;
                $current_answers = $request->$answer_drag_drop;
                //dd($current_answers);
                $dd_array['selected_answers'] = $current_answers;
                $test_answers_count = 'test_answers_count' . $drag_drop_id;
                $dd_array['answers_count'] = $request->$test_answers_count;

                // Аррей с вопросами - разбираем
                $answers_json = json_decode($drag_drop_db->answers_json);
                // Берем айди верного ответа
                $all_answers_names = $answers_json->answers; 

                $dd_array['all_answers_names'] = $all_answers_names;
                // Верные ответы
                $right_answers= [];
                // Аррей с данными
                $text_fields = [];
                // Убираем лишнее с текста
                preg_match_all('/(.*?)(\[\[.*?\]\]|$)/', strip_tags($dd_array['question_text']), $text_fields);
                // Выделяем варианты ответ
                $arr_answers = array_filter($text_fields[2]);
                // перебираем
                foreach($arr_answers as $answer_clear){
                    $clear_string = str_replace(array('[[',']]'),'',$answer_clear);
                    $dd_array['right_answers'] = $clear_string;
                    array_push($right_answers, $clear_string - 1);
                }
                $dd_array['right_answers'] = $right_answers;


                $right_count = 0;
                $grade_per_dragdrop = $dd_array['max_score'] / $dd_array['answers_count'];

                // Аррей с верными ответами
                $right_answers_names = [];
                // Заносим данные в аррей
                foreach($dd_array['all_answers_names'] as $key => $rght_answer_name){
                    foreach($dd_array['right_answers'] as $right_answer_id){
                        if($right_answer_id == $key){
                            array_push($right_answers_names, $rght_answer_name);
                        }
                    }
                }
                // Перебираем выбранные ответы - если совпадают - добавляем баллы
                foreach($dd_array['selected_answers'] as $selected_answer){
                    if(in_array($selected_answer, $right_answers_names)){
                        $test_questions_json['final_score'] = $test_questions_json['final_score'] + $grade_per_dragdrop;
                    }
                }

                array_push($drag_drop_q, $dd_array);
            }
            array_push($test_questions_json, $drag_drop_q);
        }
        $test_questions_json['final_score'] = round($test_questions_json['final_score'], 0); // |0 abs()
        //dd($test_questions_json);        //Общее кол-во баллов
        //$t_score = 100;

        // Записываем в ЛОГ данные о сданном тесте
        TestsLog::insert([
            'user_id' => Auth::user()->id,
            'test_id' => $course_id,
            'completed' => 'true',
        ]);

        // Записывает к курсу + пройденных раз.
        $course_info = Courses::where('id', $test_id)->first();
        $finised_c = $course_info->finished_count;
        if($finised_c){
            $f_count = $finised_c + 1;
        } else {
            $f_count = 1;
        }
        Courses::where('id', $course_id)->update([
            'finished_count' => $f_count,
        ]);

        $encoded_results = json_encode($test_questions_json);

        // Записываем данны в пройденные тесты.
        FinishedTestsInfo::insert([
            'user_id' => Auth::user()->id,
            'test_id' => $lesson_id, //$test_id,
            'course_id' => $test_id, //$course_id,
            'test_questions_json' => $encoded_results,
            'total_score' => $test_questions_json['final_score'],
        ]);


        return redirect()->route('view_lesson', ['course_id' => $test_id, 'lesson_id' => $course_id, ])->with([
            'success' => 'Завдання успішно збережено.',
            'test_results' => $encoded_results
        ]);
    }

    // Страница результатов теста
    public function view_test_result($course_id, $test_id, $user_id){

        $f_test_info = FinishedTestsInfo::where([
            'user_id' => $user_id,
            'test_id' => $test_id,
            'course_id' => $course_id,
        ])->first();

        return view('front.test_result', compact('f_test_info'));
    }

    // Тестовые страницы START
    public function guest()
    {
        return view('front.guest');
    }

    public function test_a()
    {
        return view('front.test_a');
    }

    public function test_b()
    {
        return view('front.test_b');
    }

    public function test_c()
    {
        return view('front.test_c');
    }
    // Тестовые страницы END

    // Получить процент
    public function get_percentage($total, $number)
    {
      if ( $total > 0 ) {
       return round($number * ($total / 100),2);
      } else {
        return 0;
      }
    }
}
