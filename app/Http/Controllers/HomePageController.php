<?php

namespace App\Http\Controllers;

use App\User;
use App\CourseViews;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomePageController extends Controller
{

    public function welcome(){

        $courses = DB::table('courses')->get();

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
        $courses = DB::table('courses')->get();
        return view('front.student_courses_main', compact('courses'));
    }

    public function student_courses()
    {
        $user_id = Auth::user()->id;
        $student = DB::table('students')->where('user_id', $user_id)->first();
        $course = DB::table('courses')->where('name', $student->course_number)->first();

        return view('front.student_courses', compact('course', 'user_id'));
    }

    public function success_for_student()
    {
        return view('front.success_for_student');
    }

    public function student_courses_ended()
    {
        return view('front.student_courses_ended');
    }

    public function student_profile()
    {
        $student_id = Auth::user()->id;
        $student_info = DB::table('users')->where('id', $student_id)->first();
        $student_full_info = DB::table('students')->where('user_id', $student_id)->first();
        $student_info->full_name = trim($student_info->surname . ' ' . $student_info->name . ' ' . $student_info->patronymic);
        return view('front.student_profile', compact('student_info', 'student_full_info'));
    }

    public function view_course($course_id, $tab = null) {
        $user = Auth::user();
        $course = DB::table('courses')->where('id', $course_id)->first();
        $course_information = DB::table('courses_information')->where('course_id', $course_id)->first();
        $course_lessons = DB::table('courses_program')->where('course_id', $course_id)->orderBy('id')->get();
        $course_faq = DB::table('courses_faq')->where('course_id', $course_id)->orderBy('id')->get();

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
            $course_teachers = DB::table('users')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
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

        $course = DB::table('courses')->where('id', $course_id)->first();

        $course_information = DB::table('courses_information')->where('course_id', $course_id)->first();

        if (is_null($course)) {
            abort(404);
        }
        if (isset($lesson_id)) {
            $lesson = DB::table('courses_program')->where([['course_id', '=', $course_id], ['id', '=', $lesson_id]])->first();
            $prevLesson = DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '<', $lesson->id]])->orderBy('id','desc')->first();
            $nextLesson = DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '>', $lesson->id]])->first();
            $lessonNumber = DB::table('courses_program')->where('course_id', '=', $course->id)->count() - DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '>', $lesson->id]])->count();
        } else {
            $lesson = DB::table('courses_program')->where('course_id', '=', $course_id)->orderBy('id','asc')->first();
        }

        if (is_null($lesson)) {
            abort(404);
        }

        if (is_null($user)) {
            $first_lesson_in_course = DB::table('courses_program')->where('course_id', '=', $course_id)->orderBy('id','asc')->first();
            if ($lesson->id > $first_lesson_in_course->id) {
               return view('front.guest');
            }
        }

        // Тесты
        $test_id = DB::table('courses_program')->where([
            'id' => $lesson_id,
            'course_id' => $course_id,
            ])->first();
        //dd("Course_id: " . $course_id . "Lesson_id: " . $lesson_id);
        if(isset($test_id->id)){
            $testInfo = DB::table('tests_info')->where('id', $test_id->test_id)->first();
        }
            // Вопросы теста
            if(isset($testInfo)){
                $testQuestions = DB::table('tests_questions')->where('test_id', $testInfo->id)->get();
                $testMultiplyIDS = [];
                $testTrueFalseIDS = [];
                $testDragDropIDS = [];
                foreach($testQuestions as $testQuest){
                    if($testQuest->question_type == "Множинний вибір"){
                        //$testMultiplyOne = DB::table('tests_multiple_choice')->where('id', $testQuest->test_answers_id)->first();
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

                    $group_students = DB::table('groups')->where('id', $testInfo->operating_mode)->first();

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
                $testMultiply = DB::table('tests_multiple_choice')->whereIn('id', $testMultiplyIDS)->get();
                $testTrueFalse = DB::table('tests_true_false')->whereIn('id', $testTrueFalseIDS)->get();
                $testDragDrop = DB::table('tests_drag_drop')->whereIn('id', $testDragDropIDS)->get();

                // Макс попыток
                $max_tries = 3;
                // Получаем кол-во пройденых раз
                $current_tries = DB::table('tests_log')->where(['user_id' => $user->id, 'test_id' => $course_id])->get();
                $current_tries_count = count($current_tries);
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
            return view('front.test', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson', 'testInfo', 'testDragDrop', 'testMultiply', 'testTrueFalse'));
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
        $test_info = DB::table('tests_info')->where('id', $test_id)->first();
        if($test_info->max_score){
            $test_questions_json['max_score'] = $test_info->max_score;
            $max_score = $test_info->max_score;
        } else { $test_questions_json['max_score'] = 0; $max_score = 0;}
        // Создаем финальную оценку
        $test_questions_json['final_score'] = 0;

        // Макс попыток
        $max_tries = 3;
        // Получаем кол-во пройденых раз
        $current_tries = DB::table('tests_log')->where(['user_id' => $user_id, 'test_id' => $test_id])->get();
        $current_tries_count = count($current_tries) + 1;
        // if($current_tries_count == 0){
        //     $current_tries_count = 1;
        // }
        // Кол-во оставшихся попытк
        if($current_tries_count >= $max_tries){
            $test_questions_json['tries_left'] = 0; 
        } else {
            // if( $current_tries_count == 0){
            //     $current_tries_count = 1;
            // }
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

        // Получаем оценку за вопрос.
        $grade_per_quest = floor($max_score / $q_num);
        // Верно \ не верно
        // Перебираем и берем данные о них с базы
        if(isset($true_false_ids)){
            foreach($true_false_ids as $key=>$true_false_id){
                $tf_array = [];
                // Строка с базы
                $true_false_db = DB::table('tests_true_false')->where('id', $true_false_id)->first();
                $tf_array['question_id'] = $true_false_id;
                $tf_array['question_type'] = "Правильно/неправильно";
                $tf_array['question_text'] = $true_false_db->question_text;
                // Текущий ответы
                $current_answers = $request->answer_truefalse;
                $tf_array['selected_answer'] = $current_answers[$key];
                // Верный ответ
                $right_answer = $true_false_db->right_answer;
                $tf_array['right_answer'] = $right_answer;
                // Проверяем верно ли ответил
                if($current_answers[$key] == $right_answer){
                    // Ответил верно
                    $tf_array['answered_right'] = "Так";
                    $test_questions_json['final_score'] = $test_questions_json['final_score'] + $grade_per_quest;
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
                $multiply_db = DB::table('tests_multiple_choice')->where('id', $multiply_id)->first();
                // Макс оценка за тест
                $max_multi_grade = $multiply_db->default_score;
                // Текущая оценка за тест
                $curr_multi_grade = 0;
                //
                $multi_array['question_id'] = $multiply_id;
                $multi_array['question_type'] = "Множинний вибір";
                $multi_array['question_text'] = $multiply_db->question_text;

                // Текущий выбранный ответ
                $request_name = 'question_' . $multiply_id;
                // Получаем текущие ответы на тест
                $current_answers = $request->$request_name;
                // Декодим ответы
                $answers_json = json_decode($multiply_db->answers_json);
                //dd($answers_json, $current_answers);
                //$m_q_num = count($answers_json);
                foreach($answers_json as $answer_info){


                    if($current_answers != null && in_array($answer_info->answer, $current_answers)){
                        $curr_multi_grade = $curr_multi_grade + round($this->get_percentage($max_multi_grade, $answer_info->answer_grade), 0);
                    } 
                    if($answer_info->answer_grade == 0 && in_array($answer_info->answer, $current_answers)){
                        //dd("Wrong answer");
                        $curr_multi_grade = 0;
                    }

                    if($answer_info->answer){
                        $multi_array['answer_grade'] = $answer_info->answer_grade;
                        //$test_questions_json['final_score'] = $test_questions_json['final_score'] + ($grade_per_quest / 2);
                    } else {
                        $multi_array['answer_grade'] = 0;
                    }
                }
                //dd($curr_multi_grade);
                array_push($multiply_q, $multi_array);
                $test_questions_json['final_score'] = $test_questions_json['final_score'] + $curr_multi_grade;
            }
            array_push($test_questions_json, $multiply_q);
        }
        //dd($test_questions_json);
        // Петераскивание
        if(isset($drag_drop_ids)){
            // Перебираем и берем данные о них с базы
            foreach($drag_drop_ids as $key=>$drag_drop_id){
                $dd_array = [];
                // Строка с базы
                $drag_drop_db = DB::table('tests_drag_drop')->where('id', $drag_drop_id)->first();
                $dd_array['question_id'] = $drag_drop_id;
                $dd_array['question_type'] = "Перетягування в тексті";
                $dd_array['question_text'] = $drag_drop_db->question_text;
                // Текущий выбранный ответ
                $current_answers = $request->answer_dragdrop;
                $dd_array['selected_answer'] = $current_answers[$key];
                // Аррей с вопросами - разбираем
                $answers_json = json_decode($drag_drop_db->answers_json);
                // Берем айди верного ответа
                //dd($answers_json);
                $right_answer_id = $answers_json->right_answer;
                // Берем верный овтвет
                //dd($answers_json->answers[$right_answer_id]);
                if($right_answer_id == "Выберите верный ответ"){
                    $right_answer_id = 0;
                } else {
                    $right_answer_id = $right_answer_id -1;
                }
                $right_answer = $answers_json->answers[$right_answer_id];
                $dd_array['right_answer'] = $right_answer;
                // Проверяем верно ли ответил
                if($right_answer == $current_answers[$key]){
                    // Ответил верно
                    $dd_array['answered_right'] = "Так";
                    $test_questions_json['final_score'] = $test_questions_json['final_score'] + $grade_per_quest;
                } else {
                    // Ответил не верно
                    $dd_array['answered_right'] = "Ні";
                }
                array_push($drag_drop_q, $dd_array);
            }
            array_push($test_questions_json, $drag_drop_q);
        }

        //Общее кол-во баллов
        $t_score = 100;

        // Записываем в ЛОГ данные о сданном тесте
        DB::table('tests_log')->insert([
            'user_id' => Auth::user()->id,
            'test_id' => $test_id,
            'completed' => 'true',
        ]);

        // Записывает к курсу + пройденных раз.
        $course_info = DB::table('courses')->where('id', $test_id)->first();
        $finised_c = $course_info->finished_count;
        if($finised_c){
            $f_count = $finised_c + 1;
        } else {
            $f_count = 1;
        }
        DB::table('courses')->where('id', $course_id)->update([
            'finished_count' => $f_count,
        ]);

        // 
        //dd($test_id, $course_id);
        //$test_questions_json['final_score'] = 
        //dd($test_questions_json);
        //dd($q_num);

        $encoded_results = json_encode($test_questions_json);

        //dd($test_questions_json);
        // Записываем данны в пройденные тесты.
        DB::table('finished_tests_info')->insert([
            'user_id' => Auth::user()->id,
            'test_id' => $test_id,
            'course_id' => $course_id,
            'test_questions_json' => $encoded_results,
            'total_score' => $t_score
        ]);


        return redirect()->route('view_lesson', ['course_id' => $test_id, 'lesson_id' => $course_id, ])->with([
            'success' => 'Завдання успішно збережено.',
            'test_results' => $encoded_results
        ]);
        //return back();
    }

    public function view_test_result($course_id, $test_id, $user_id){

        $f_test_info = DB::table('finished_tests_info')->where([
            'user_id' => $user_id,
            'test_id' => $test_id,
            'course_id' => $course_id,
        ])->first();

        return view('front.test_result', compact('f_test_info'));
    }

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

    public function get_percentage($total, $number)
    {
      if ( $total > 0 ) {
       return round($number * ($total / 100),2);
      } else {
        return 0;
      }
    }
}
