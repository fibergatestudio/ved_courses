<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\CoursesProgram;
use App\Groups;
use App\TestsInfo;
use App\TestsQuestions;

use App\TestsMultipleChoice;
use App\TestsTrueFalse;
use App\TestsDragDrop;
use App\TestsLog;
use App\Tests;
use App\TestsShortAnswer;
use App\SimpleTests;

class TestsController extends Controller
{
    public function index(){

        $tests_info = TestsInfo::get();
        $simple_tests = SimpleTests::get();
        //$test_info = TestsInfo::get();

        return view('tests.index', compact('tests_info','simple_tests') );
    }

    public function new_test(){

        return view('tests.create_test');
    }

    // --------------------Новое создание тестов (под вертску) ------------------------
    public function new_test_info(){

        //dd(request()->has('course_id'));
        // Получаем айди курса
        $course_id = request()->course_id;
        $courses_program_id = request()->courses_program_id;

        $groups = Groups::get();

        return view('tests.create_test_info', compact('course_id', 'courses_program_id', 'groups'));
    }

    public function create_new_test_info(Request $request){

        //dd($request->all());

        // View OPTIONS

        $options_array = ["null"];
        $options_json = json_encode($options_array);
        //dd($options_array);


        $arr_ext = $request->extended_feedback;

        $arr_1 = [
            'grade' => '100',
            'review' => $request->extended_feedback_100,
        ];

        //dd($request->grade_counter);

        $grades_counter = $request->grade_counter;
        $grade_arr = [];
        for($i = 1; $i <= $grades_counter; $i++){
            $grade = "extended_feedback_grade" . $i;
            $comment = "extended_feedback_review" . $i;

            $arr_ = [
                'grade' => $request->$grade,
                'review' => strip_tags ($request->$comment),
            ];

            //dd($c);
            array_push($grade_arr, $arr_);
        }
        //dd($grade_arr);
        // $arr_2 = [
        //     'grade' => $request->extended_feedback_grade,
        //     'review' => $request->extended_feedback_review,
        // ];

        $arr_3 = [
            'grade' => '0',
            'review' => $request->extended_feedback_0,
        ];

        $options_array = ['grade_100' => $arr_1, 'grade_custom' => $grade_arr, 'grade_0' => $arr_3];
        $extended_feedback = json_encode($options_array);
        //dd($extended_feedback);


        $test_info_id = TestsInfo::insertGetId([
            // Общее
            'name'                      => $request->name,
            'description'               => $request->description,
            // Выбор времени
            'start_date_time'           => $request->start_date_time,
            'end_date_time'             => $request->end_date_time,
            'time_limit'                => $request->time_limit,
            'when_time_is_up'           => $request->when_time_is_up, 
            // Оценка
            'passing_score'             => $request->passing_score,
            'available_attempts'        => $request->available_attempts,
            'assessment_method'         => $request->assessment_method,
            // Поведение вопросов
            'random_answers_order'      => $request->random_answers_order,
            'getting_result'            => $request->getting_result,
            // Разширенный ответ
            'extended_feedback'          => $extended_feedback,
            // Общие настройки модуля
            'availability'              => $request->availability,
            'operating_mode'            => $request->operating_mode,

        ]);
        
        // Берем айди курса
        $course_id = request()->course_id;
        $courses_program_id = request()->courses_program_id;
        //dd($courses_program_id);
        // Если айди существует, добавляем текущий текст к курсу
        if($course_id){
            CoursesProgram::where('id', $courses_program_id)->update([
                'test_id' => $test_info_id,
            ]);
        }

        // Создаем тест и редиректим на добавление вопроса

        //$this->question_type_submit($test_info_id, $request);

        $question_type = $request->question_type;
        //dd($question_type);
        if($question_type == "Множинний вибір"){
            return \Redirect::route('multiple_choice', $test_info_id);
        } else if ($question_type == "Правильно/неправильно"){
            return \Redirect::route('true_false', $test_info_id);
        } else if ($question_type == "Перетягування в тексті"){
            return \Redirect::route('drag_drop', $test_info_id);
        }

        //return \Redirect::route('question_type', $test_info_id)->with('message', 'State saved correctly!!!');
    }

    public function question_type($test_info_id){

        return view('tests.question_type', compact('test_info_id'));
    }
    public function question_type_submit($test_info_id, Request $request){

        // Получаем тип вопроса
        $question_type = $request->question_type;
        // Если тип вопроса ...
        if($question_type == "Множинний вибір"){
            return \Redirect::route('multiple_choice', $test_info_id);
        } else if ($question_type == "Правильно/неправильно"){
            return \Redirect::route('true_false', $test_info_id);
        } else if ($question_type == "Перетягування в тексті"){
            return \Redirect::route('drag_drop', $test_info_id);
        }

    }

    public function multiple_choice($test_info_id){

        return view('tests.create_multiple_choice', compact('test_info_id'));
    }

    public function create_multiple_choice($test_info_id, Request $request){

        //dd($request->all());

        $q_type = "Множинний вибір";

        $a_counter = $request->answer_counter;
        //dd($a_counter);

        //$q_c = $request->questions_counter;
        $answers_arr = [];
        for($i = 0; $i <= $a_counter; $i++){
            //$c = "course_learn" . $i;
            $answr = "answer" . $i;
            $answer_plusminus = "answer_plusminus" . $i;
            $answer_grade = "answer_grade" . $i;
            $answer_comment = "answer_comment" . $i; 
            
            //dd($c);
            $arr_answer = [
                'answer' => strip_tags( $request->$answr ),
                'answer_plusminus' => $request->$answer_plusminus,
                'answer_grade' => $request->$answer_grade,
                'answer_comment' => strip_tags( $request->$answer_comment),
            ];

            array_push($answers_arr, $arr_answer);
        }
        //dd($answers_arr);

        // Если тип вопроса "множественный выбор"
        //if($request->question_type == 'Множественный выбор'){

            // Формирование Инфы для джсона

            // Енкод инфы
            $answers_json = json_encode($answers_arr);

            // Добавляем вопроса в базу
            $insrt_id = TestsMultipleChoice::insertGetId([
                'question_name'         => $request->question_name,
                'question_text'         => $request->question_text,
                'default_score'         => $request->default_score,
                'test_comment'          => $request->test_comment,
                'answers_type'          => $request->answers_type,
                'number_answers'        => $request->number_answers,
                'answers_json'          => $answers_json,
            ]);

            // Добавляем таблицу вопроса
            $testQuest_id = TestsQuestions::insertGetId([
                'test_id'               => $test_info_id,
                'question_type'         => $q_type,
                'test_answers_id'       => $insrt_id,
            ]);

        //} 

        $redirect = $request->redirect;
        if($redirect == 'false'){
            return \Redirect::route('view_test_info_questions', [$test_info_id])->with('message_success', 'Питання успішно додано');
        } else {
            return \Redirect::route('edit_test_question', [$test_info_id, $testQuest_id])->with('message_success', 'Питання успішно додано');
        }
    }
    
    public function true_false($test_info_id){

        return view('tests.create_true_false', compact('test_info_id'));
    }

    public function create_true_false($test_info_id, Request $request){

        //dd($request->all());

        $q_type = "Правильно/неправильно";

        // Формирование Инфы для джсона
        $a_data = "";

        // Енкод инфы
        $answers_json = json_encode($a_data);

        // Добавляем вопроса в базу
        $insrt_id = TestsTrueFalse::insertGetId([
            'question_name'         => $request->question_name,
            'question_text'         => $request->question_text,
            'default_score'         => $request->default_score,
            'test_comment'          => $request->test_comment,
            'right_answer'          => $request->right_answer,
            'right_answer_comment'  => $request->right_answer_comment,
            'wrong_answer_comment'  => $request->wrong_answer_comment
        ]);

        // Добавляем таблицу вопроса
        $testQuest_id = TestsQuestions::insertGetId([
            'test_id'               => $test_info_id,
            'question_type'         => $q_type,
            'test_answers_id'       => $insrt_id,
        ]);     

        //return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
        //return \Redirect::route('view_test_info_questions', [$test_info_id])->with('message_success', 'Питання успішно додано');   

        $redirect = $request->redirect;
        if($redirect == 'false'){
            return \Redirect::route('view_test_info_questions', [$test_info_id])->with('message_success', 'Питання успішно додано');   
        } else {
            return \Redirect::route('edit_test_question', [$test_info_id, $testQuest_id])->with('message_success', 'Питання успішно додано');
        }
    }

    public function short_answer($test_info_id){

        return view('tests.create_short_answer', compact('test_info_id'));
    }

    public function create_short_answer($test_info_id, Request $request){

        $q_type = "Краткий ответ";

        // Формирование Инфы для джсона
        $a_data = "";

        // Енкод инфы
        $answers_json = json_encode($a_data);

        // Добавляем вопроса в базу
        $insrt_id = TestsShortAnswer::insertGetId([
            'question_name'         => $request->question_name,
            'question_text'         => $request->question_text,
            'default_score'         => $request->default_score,
            'test_comment'          => $request->test_comment,
            //'answers_type'          => $request->answers_type,
            //'number_answers'        => $request->number_answers,
            //'answers_json'          => $answers_json,
        ]);

        // Добавляем таблицу вопроса
        TestsQuestions::insert([
            'test_id'               => $test_info_id,
            'question_type'         => $q_type,
            'test_answers_id'       => $insrt_id,
        ]);    

        //return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
        return redirect('courses_controll')->with('message_success', 'Вопрос успешно добавлен!');
        
    }

    public function drag_drop($test_info_id){

        return view('tests.create_drag_drop', compact('test_info_id'));
    }

    public function create_drag_drop($test_info_id, Request $request){

        //dd($request->all());

        $answers_counter = $request->answers_counter;
        $answers_counter = $answers_counter - 1;
        //dd($answers_counter);
        $answers_arr = [];
        $arr_answ = [];
        for($i = 0; $i <= $answers_counter; $i++){
            $answer = "answer" . $i;

            $answer_text =  $request->$answer;

            array_push($arr_answ, $answer_text);
        }

        $r_answer_arr = [
            'right_answer' => $request->right_answer,
        ];
        $answers_arr['question'] = strip_tags($request->question_text);
        $answers_arr['answers'] = $arr_answ;
        //dd($answers_arr);

        

        $q_type = "Перетягування в тексті";
        // Енкод инфы
        $answers_json = json_encode($answers_arr);

        // Добавляем вопроса в базу
        $insrt_id = TestsDragDrop::insertGetId([
            'question_name'         => $request->question_name,
            'question_text'         => $request->question_text,
            'default_score'         => $request->default_score,
            'test_comment'          => $request->test_comment,
            //'answers_type'          => $request->answers_type,
            //'number_answers'        => $request->number_answers,
            'answers_json'          => $answers_json,
        ]);

        // Добавляем таблицу вопроса
        $testQuest_id = TestsQuestions::insertGetId([
            'test_id'               => $test_info_id,
            'question_type'         => $q_type,
            'test_answers_id'       => $insrt_id,
        ]);

        //return redirect('courses_controll')->with('message_success', 'Вопрос успешно добавлен!');
        $redirect = $request->redirect;
        if($redirect == 'false'){
            return \Redirect::route('view_test_info_questions', [$test_info_id])->with('message_success', 'Питання успішно додано');   
        } else {
            return \Redirect::route('edit_test_question', [$test_info_id, $testQuest_id])->with('message_success', 'Питання успішно додано');
        }
    }

    // Просмотр теста вопросов\ответов 
    public function view_test_info_questions($test_info_id){

        // Получаем информацию о тесте.
        $test_view_info = TestsInfo::where('id', $test_info_id)->first();
        $test_question_answers = TestsQuestions::where('test_id', $test_info_id)->get();

        // Подтяжка вопросов\ответов
        foreach($test_question_answers as $t_quest){
            // Если тип вопроса множественнный выбор
            if($t_quest->question_type == "Множинний вибір"){
                $answer_info = TestsMultipleChoice::where('id', $t_quest->test_answers_id)->first();
                if($answer_info->question_name){
                    $t_quest->question_name = $answer_info->question_name;
                } else {
                    $t_quest->question_name = "";
                }
                
            }
            if($t_quest->question_type == "Правильно/неправильно"){
                $answer_info = TestsTrueFalse::where('id', $t_quest->test_answers_id)->first();
                if($answer_info->question_name){
                    $t_quest->question_name = $answer_info->question_name;
                } else {
                    $t_quest->question_name = "";
                }
            }
            // if($t_quest->question_type == "Краткий ответ"){
            //     $answer_info = TestsShortAnswer::where('id', $t_quest->test_answers_id)->first();
            //     $t_quest->question_name = $answer_info->question_name;
            // }
            if($t_quest->question_type == "Перетягування в тексті"){
                $answer_info = TestsDragDrop::where('id', $t_quest->test_answers_id)->first();
                if($answer_info->question_name){
                    $t_quest->question_name = $answer_info->question_name;
                } else {
                    $t_quest->question_name = "";
                }
            }

        }

        $groups = Groups::get();
        //dd($test_question_answers);

        return view('tests.view_test_info_questions', compact('test_info_id', 'test_view_info', 'test_question_answers', 'groups'));
    }

    public function update_test_info_questions($test_info_id, Request $request){

        //dd($request->all());

        $max_score = $request->max_score;

        if($max_score == null){
            $max_score = 0;
        }

        TestsInfo::where('id', $test_info_id)->update([
            'max_score' => $max_score,
            // Общее
            'name'                      => $request->name,
            'description'               => $request->description,
            // Выбор времени
            'start_date_time'           => $request->start_date_time,
            'end_date_time'             => $request->end_date_time,
            'time_limit'                => $request->time_limit,
            'when_time_is_up'           => $request->when_time_is_up, 
            // Оценка
            'passing_score'             => $request->passing_score,
            'available_attempts'        => $request->available_attempts,
            'assessment_method'         => $request->assessment_method,
            // Поведение вопросов
            'random_answers_order'      => $request->random_answers_order,
            'getting_result'            => $request->getting_result,
            // Общие настройки модуля
            'availability'              => $request->availability,
            'operating_mode'            => $request->operating_mode,
        ]);

        $info = TestsQuestions::where('id', $test_info_id)->first();
        // dd($info);
        //return \Redirect::route('add_lesson', $info->test_id);
        //return \Redirect::route('edit_lesson');
        return back();
    }

    public function delete_test_question($test_info_id, $question_id, Request $request){

        // Получаем тип вопроса с запроса
        $question_type = $request->question_type;

            // Если тип вопроса равен = опр. типу
            if($question_type == "Правильно/неправильно"){
                // Удаляем вопрос
                $tf = TestsTrueFalse::where('id', $test_info_id)->delete();
            }
            if($question_type == "Множинний вибір"){
                $mc = TestsMultipleChoice::where('id', $test_info_id)->delete();
            }
            if($question_type == "Перетягування в тексті"){
                $dd = TestsDragDrop::where('id', $test_info_id)->delete();
            }
            // Удаляем вопрос из вопросов теста
            TestsQuestions::where('id', $question_id)->delete();

        // Возвращаем назад
        return back();
    }
    // -----------------Конец создания новых тестов-------------------------



    public function create_test(Request $request){

        $all_info = $request->all();
        //dd($all_info);
        // Аррей для вопросов теста
        $data = [];

        // Нумерация
        $i = 0;
        foreach($all_info['question'] as $question){
            //Добавляем вопрос
            $data[$i]['id'] = $i;
            $data[$i]['question'] = $question;
            $data[$i]['question_end'] = $all_info['question_end'][$i];
            //Фикс для ответов
            $answer = 'answer';
            $answer .= $i;
            // Добавляем все ответы
            $data[$i]['answer'] = $all_info[$answer];

            $right_answer = 'right_answer';
            $right_answer .= $i;
            // Добавляем ответ
            //foreach($all_info['right_answer'] as $answer){
            $data[$i]['right_answer'] = $all_info[$right_answer];
           // }
            $i++;
        }
        //dd($data);
        //Формируем джсон
        $insert_data = json_encode($data);

        Tests::insert([
            'name' => $request->name,
            'description' => $request->description,
            'test_info' => $insert_data,
            'views' => '0',
            'finished_count' => '0',
            'creator_id' => Auth::user()->id,
        ]);
        
        return redirect('tests_controll')->with('message_success', 'Тест успешно создан!');
    }

    public function edit_test($test_id){

        //dd($test_id);

        $test_info = Tests::where('id', $test_id)->first();

        return view('tests.edit_test', compact('test_id', 'test_info') );
    }

    public function edit_test_apply( $test_id, Request $request){

        //dd($request->all());
        
        Tests::where('id', $test_id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_enabled' => $request->is_enabled,
        ]);


        return redirect()->back()->with('message_success', 'Тест успешно обновлен!');
    }

    public function new_simple_test(){

        return view('tests.create_simple_test');
    }

    
    public function create_simple_test(Request $request){

        $all_info = $request->all();
        //dd($all_info);
        // Аррей для вопросов теста
        $data = [];

        // Нумерация
        $i = 0;
        foreach($all_info['question'] as $question){
            //Добавляем вопрос
            $data[$i]['question'] = $question;
            //Фикс для ответов
            $answer = 'answer';
            $answer .= $i;
            // Добавляем все ответы
            $data[$i]['answer'] = $all_info[$answer];

            $right_answer = 'right_answer';
            $right_answer .= $i;
            // Добавляем ответ
            //foreach($all_info['right_answer'] as $answer){
            $data[$i]['right_answer'] = $all_info[$right_answer];
           // }
            $i++;
        }
        //dd($data);
        //Формируем джсон
        $insert_data = json_encode($data);

        SimpleTests::insert([
            'name' => $request->name,
            'description' => $request->description,
            'test_info' => $insert_data,
            'views' => '0',
            'finished_count' => '0',
            'creator_id' => Auth::user()->id,
        ]);
        
        return redirect('tests_controll')->with('message_success', 'Тест успешно создан!');
    }

    function view_simple_test($test_id){

        $test_info = SimpleTests::where('id', $test_id)->first();

        // Плюс к просмотру теста
        $views = $test_info->finished_count + 1;
        SimpleTests::where('id', $test_id)->update([
            'views' => $views,
        ]);
        //

        $test_qa = json_decode($test_info->test_info);
        //dd($test_qa);

        return view('tests.view_test', compact('test_info', 'test_qa'));
    }

    function view_test($test_id){

        $test_info = Tests::where('id', $test_id)->first();
        
        // Плюс к просмотру теста
        $views = $test_info->finished_count + 1;
        Tests::where('id', $test_id)->update([
            'views' => $views,
        ]);
        //

        $test_qa = json_decode($test_info->test_info);
        //dd($test_qa);

        return view('tests.view_sort', compact('test_info', 'test_qa'));
    }

    function test_submit(Request $request, $test_id){

        // Получаем всю POST инфу
        $all_info = $request->all();
        //dd($all_info);

        $current_test = Tests::where('id', $test_id)->first();
        $finished_count = $current_test->finished_count + 1;
        //dd($finished_count);

        // Обновляем кол-во сданных тестов
        Tests::where('id', $test_id)->update([
            'finished_count' => $finished_count,
        ]);

        // Записываем в ЛОГ данные о сданном тесте
        TestsLog::insert([
            'user_id' => Auth::user()->id,
            'test_id' => $test_id,
            'completed' => 'true',
        ]);

        return redirect('tests_controll')->with('message_success', 'Тест успешно сдан!');
    }

    function view_sort($test_id){

        $test_info = Tests::where('id', $test_id)->first();
        
        // Плюс к просмотру теста
        $views = $test_info->finished_count + 1;
        Tests::where('id', $test_id)->update([
            'views' => $views,
        ]);
        //

        $test_qa = json_decode($test_info->test_info);

        return view('tests.view_sort', compact('test_info', 'test_qa'));
    }
    
    public function delete_test($test_info_id){

        //dd($test_info_id);

        //Удаляем test_info
        //TestsInfo::where('id', $test_info_id)->delete();


        $questions = TestsQuestions::where('test_id', $test_info_id)->get();
        //dd($questions);

        foreach($questions as $question){
            if($question->question_type == "Множинний вибір"){
                TestsMultipleChoice::where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Правильно/неправильно"){
                TestsTrueFalse::where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Краткий ответ"){
                TestsShortAnswer::where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Перетягування в тексті"){ 
                TestsDragDrop::where('id', $question->test_answers_id)->delete();
            }
        }
        //Удаляем test_info
        TestsInfo::where('id', $test_info_id)->delete();

        TestsQuestions::where('test_id', $test_info_id)->delete();
        //

        // Обновляем урок курса там где был тест
        CoursesProgram::where('test_id', $test_info_id)->update([
            'test_id' => null,
        ]);

        return back()->with('message_success', 'Тест удален!');
    }

    public function edit_test_question($test_info_id, $test_question_id){

        //dd($test_info_id, $test_question_id);

        $test_t = TestsQuestions::where([
            'id' => $test_question_id,
            'test_id' => $test_info_id
        ])->first();

        if($test_t->question_type == "Множинний вибір"){
            $t_question_info = TestsMultipleChoice::where('id', $test_t->test_answers_id)->first();

            return view('tests.edit_multiple_choice', compact('test_info_id', 'test_question_id','t_question_info'));
        } else if($test_t->question_type == "Правильно/неправильно"){
            $t_question_info = TestsTrueFalse::where('id', $test_t->test_answers_id)->first();

            return view('tests.edit_true_false', compact('test_info_id', 'test_question_id','t_question_info'));
        } else if($test_t->question_type == "Перетягування в тексті"){
            $t_question_info = TestsDragDrop::where('id', $test_t->test_answers_id)->first();

            return view('tests.edit_drag_drop', compact('test_info_id', 'test_question_id','t_question_info'));
        }
    }

    // Применение редактирование вопроса теста
    public function edit_test_question_apply($test_info_id, $test_question_id, Request $request){

        //dd($request->all());
        $all_info = $request->all();
        //dd($all_info);
        $test_t = TestsQuestions::where([
            'id' => $test_question_id,
            'test_id' => $test_info_id
        ])->first();


        if($test_t->question_type == "Множинний вибір"){

            $a_counter = $request->answer_counter;
            $answers_arr = [];
            for($i = 0; $i <= $a_counter; $i++){
                //$c = "course_learn" . $i;
                $answr = "answer" . $i;
                $answer_plusminus = "answer_plusminus" . $i;
                $answer_grade = "answer_grade" . $i;
                $answer_comment = "answer_comment" . $i;
              

                $arr_answer = [
                    'answer' => strip_tags( $request->$answr ),
                    'answer_plusminus' => $request->$answer_plusminus,
                    'answer_grade' => $request->$answer_grade,
                    'answer_comment' => strip_tags( $request->$answer_comment),
                ];
                if(strip_tags( $request->$answr ) != ""){
                    array_push($answers_arr, $arr_answer);
                }
            }
            //dd($answers_arr);
            // Формирование Инфы для джсона
            // Енкод инфы
            $answers_json = json_encode($answers_arr);
            
            TestsMultipleChoice::where('id', $test_t->test_answers_id)->update([
                'question_name'         => $request->question_name,
                'question_text'         => $request->question_text,
                'default_score'         => $request->default_score,
                'test_comment'          => $request->test_comment,
                'answers_type'          => $request->answers_type,
                'number_answers'        => $request->number_answers,
                'answers_json'          => $answers_json,
            ]);
        }else if($test_t->question_type == "Правильно/неправильно"){
            TestsTrueFalse::where('id', $test_t->test_answers_id)->update([
                'question_name' => $request->question_name,
                'question_text' => $request->question_text,
                'default_score' => $request->default_score,
                'test_comment' => $request->test_comment,
                'right_answer' => $request->right_answer,
                'right_answer_comment' => $request->right_answer_comment,
                'wrong_answer_comment' => $request->wrong_answer_comment,
            ]);
        }else if($test_t->question_type == "Перетягування в тексті"){
            $answers_counter = $request->answers_counter;
            //dd($answers_counter);
            //dd($answers_counter);
            $answers_arr = [];
            $arr_answ = [];
            for($i = 0; $i <= $answers_counter; $i++){
                $answer = "answer" . $i;
    
                $answer_text =  $request->$answer;
                if($answer_text != null){
                    array_push($arr_answ, $answer_text);
                }
                
            }
    
            $r_answer_arr = [
                'right_answer' => $request->right_answer,
            ];
            $answers_arr['question'] = strip_tags($request->question_text);
            $answers_arr['answers'] = $arr_answ;
            $answers_arr['right_answer'] = $request->right_answer;
            //HERE
    
            // Енкод инфы
            //dd($answers_arr);
            $answers_json = json_encode($answers_arr);

            TestsDragDrop::where('id', $test_t->test_answers_id)->update([                
                'question_name'         => $request->question_name,
                'question_text'         => $request->question_text,
                'default_score'         => $request->default_score,
                'test_comment'          => $request->test_comment,
                'answers_json'          => $answers_json,
            ]);
        }

        return \Redirect::route('view_test_info_questions', [$test_info_id])->with('message_success', 'Питання успішно змінено');
    }

    // Удаление вопроса теста
    public function edit_test_question_delete($test_info_id, $test_question_id){

        $test_t = TestsQuestions::where([
            'id' => $test_question_id,
            'test_id' => $test_info_id
        ])->first();

        if($test_t->question_type == "Множинний вибір"){
            TestsMultipleChoice::where('id', $test_t->test_answers_id)->delete();
        }else if($test_t->question_type == "Правильно/неправильно"){
            TestsTrueFalse::where('id', $test_t->test_answers_id)->delete();
        }else if($test_t->question_type == "Перетягування в тексті"){
            TestsDragDrop::where('id', $test_t->test_answers_id)->delete();
        }

        TestsQuestions::where([
            'id' => $test_question_id,
            'test_id' => $test_info_id
        ])->delete();

        return \Redirect::route('view_test_info_questions', [$test_info_id])->with('message_success', 'Питання успішно видалено');
    }

}
