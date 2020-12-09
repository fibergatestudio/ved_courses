<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;

class TestsController extends Controller
{
    public function index(){

        $tests_info = DB::table('tests_info')->get();
        $simple_tests = DB::table('simple_tests')->get();
        //$test_info = DB::table('tests_info')->get();

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

        $groups = DB::table('groups')->get();

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


        $test_info_id = DB::table('tests_info')->insertGetId([
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
            DB::table('courses_program')->where('id', $courses_program_id)->update([
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
            $answer_grade = "answer_grade" . $i;
            $answer_comment = "answer_comment" . $i;
            //dd($c);
            $arr_answer = [
                'answer' => strip_tags( $request->$answr ),
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
            $insrt_id = DB::table('tests_multiple_choice')->insertGetId([
                'question_name'         => $request->question_name,
                'question_text'         => $request->question_text,
                'default_score'         => $request->default_score,
                'test_comment'          => $request->test_comment,
                'answers_type'          => $request->answers_type,
                'number_answers'        => $request->number_answers,
                'answers_json'          => $answers_json,
            ]);

            // Добавляем таблицу вопроса
            DB::table('tests_questions')->insert([
                'test_id'               => $test_info_id,
                'question_type'         => $q_type,
                'test_answers_id'       => $insrt_id,
            ]);

        //} 


        //return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
        return redirect('courses_controll')->with('message_success', 'Вопрос успешно добавлен!');
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
        $insrt_id = DB::table('tests_true_false')->insertGetId([
            'question_name'         => $request->question_name,
            'question_text'         => $request->question_text,
            'default_score'         => $request->default_score,
            'test_comment'          => $request->test_comment,
            'right_answer'          => $request->right_answer,
            'right_answer_comment'  => $request->right_answer_comment,
            'wrong_answer_comment'  => $request->wrong_answer_comment
        ]);

        // Добавляем таблицу вопроса
        DB::table('tests_questions')->insert([
            'test_id'               => $test_info_id,
            'question_type'         => $q_type,
            'test_answers_id'       => $insrt_id,
        ]);     

        //return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
        return redirect('courses_controll')->with('message_success', 'Вопрос успешно добавлен!');
        
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
        $insrt_id = DB::table('tests_short_answer')->insertGetId([
            'question_name'         => $request->question_name,
            'question_text'         => $request->question_text,
            'default_score'         => $request->default_score,
            'test_comment'          => $request->test_comment,
            //'answers_type'          => $request->answers_type,
            //'number_answers'        => $request->number_answers,
            //'answers_json'          => $answers_json,
        ]);

        // Добавляем таблицу вопроса
        DB::table('tests_questions')->insert([
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
        $answers_arr['answers'] = $arr_answ;
        $answers_arr['right_answer'] = $request->right_answer;
        //dd($answers_arr);

        

        $q_type = "Перетягування в тексті";
        // Енкод инфы
        $answers_json = json_encode($answers_arr);

        // Добавляем вопроса в базу
        $insrt_id = DB::table('tests_drag_drop')->insertGetId([
            'question_name'         => $request->question_name,
            'question_text'         => $request->question_text,
            'default_score'         => $request->default_score,
            'test_comment'          => $request->test_comment,
            //'answers_type'          => $request->answers_type,
            //'number_answers'        => $request->number_answers,
            'answers_json'          => $answers_json,
        ]);

        // Добавляем таблицу вопроса
        DB::table('tests_questions')->insert([
            'test_id'               => $test_info_id,
            'question_type'         => $q_type,
            'test_answers_id'       => $insrt_id,
        ]);

        //return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
        return redirect('courses_controll')->with('message_success', 'Вопрос успешно добавлен!');
    }

    // Просмотр теста вопросов\ответов 
    public function view_test_info_questions($test_info_id){

        // Получаем информацию о тесте.
        $test_view_info = DB::table('tests_info')->where('id', $test_info_id)->first();
        $test_question_answers = DB::table('tests_questions')->where('test_id', $test_info_id)->get();

        // Подтяжка вопросов\ответов
        foreach($test_question_answers as $t_quest){
            // Если тип вопроса множественнный выбор
            if($t_quest->question_type == "Множинний вибір"){
                $answer_info = DB::table('tests_multiple_choice')->where('id', $t_quest->test_answers_id)->first();
                if($answer_info->question_name){
                    $t_quest->question_name = $answer_info->question_name;
                } else {
                    $t_quest->question_name = "";
                }
                
            }
            if($t_quest->question_type == "Правильно/неправильно"){
                $answer_info = DB::table('tests_true_false')->where('id', $t_quest->test_answers_id)->first();
                if($answer_info->question_name){
                    $t_quest->question_name = $answer_info->question_name;
                } else {
                    $t_quest->question_name = "";
                }
            }
            // if($t_quest->question_type == "Краткий ответ"){
            //     $answer_info = DB::table('tests_short_answer')->where('id', $t_quest->test_answers_id)->first();
            //     $t_quest->question_name = $answer_info->question_name;
            // }
            if($t_quest->question_type == "Перетягування в тексті"){
                $answer_info = DB::table('tests_drag_drop')->where('id', $t_quest->test_answers_id)->first();
                if($answer_info->question_name){
                    $t_quest->question_name = $answer_info->question_name;
                } else {
                    $t_quest->question_name = "";
                }
            }

        }

        //dd($test_question_answers);

        return view('tests.view_test_info_questions', compact('test_info_id', 'test_view_info', 'test_question_answers'));
    }

    public function update_test_info_questions($test_info_id, Request $request){

        //dd($request->all());

        $max_score = $request->max_score;

        if($max_score == null){
            $max_score = 0;
        }

        DB::table('tests_info')->where('id', $test_info_id)->update([
            'max_score' => $max_score,
        ]);

        $info = DB::table('tests_questions')->where('id', $test_info_id)->first();
        // dd($info);
        // return \Redirect::route('add_lesson', $info->test_id);
        return back();
    }

    public function delete_test_question($test_info_id, $question_id, Request $request){

        // Получаем тип вопроса с запроса
        $question_type = $request->question_type;

            // Если тип вопроса равен = опр. типу
            if($question_type == "Правильно/неправильно"){
                // Удаляем вопрос
                $tf = DB::table('tests_true_false')->where('id', $test_info_id)->delete();
            }
            if($question_type == "Множинний вибір"){
                $mc = DB::table('tests_multiple_choice')->where('id', $test_info_id)->delete();
            }
            if($question_type == "Перетягування в тексті"){
                $dd = DB::table('tests_drag_drop')->where('id', $test_info_id)->delete();
            }
            // Удаляем вопрос из вопросов теста
            DB::table('tests_questions')->where('id', $question_id)->delete();

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

        DB::table('tests')->insert([
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

        $test_info = DB::table('tests')->where('id', $test_id)->first();

        return view('tests.edit_test', compact('test_id', 'test_info') );
    }

    public function edit_test_apply( $test_id, Request $request){

        //dd($request->all());
        
        DB::table('tests')->where('id', $test_id)->update([
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

        DB::table('simple_tests')->insert([
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

        $test_info = DB::table('simple_tests')->where('id', $test_id)->first();

        // Плюс к просмотру теста
        $views = $test_info->finished_count + 1;
        DB::table('simple_tests')->where('id', $test_id)->update([
            'views' => $views,
        ]);
        //

        $test_qa = json_decode($test_info->test_info);
        //dd($test_qa);

        return view('tests.view_test', compact('test_info', 'test_qa'));
    }

    function view_test($test_id){

        $test_info = DB::table('tests')->where('id', $test_id)->first();
        
        // Плюс к просмотру теста
        $views = $test_info->finished_count + 1;
        DB::table('tests')->where('id', $test_id)->update([
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

        $current_test = DB::table('tests')->where('id', $test_id)->first();
        $finished_count = $current_test->finished_count + 1;
        //dd($finished_count);

        // Обновляем кол-во сданных тестов
        DB::table('tests')->where('id', $test_id)->update([
            'finished_count' => $finished_count,
        ]);

        // Записываем в ЛОГ данные о сданном тесте
        DB::table('tests_log')->insert([
            'user_id' => Auth::user()->id,
            'test_id' => $test_id,
            'completed' => 'true',
        ]);

        return redirect('tests_controll')->with('message_success', 'Тест успешно сдан!');
    }

    function view_sort($test_id){

        $test_info = DB::table('tests')->where('id', $test_id)->first();
        
        // Плюс к просмотру теста
        $views = $test_info->finished_count + 1;
        DB::table('tests')->where('id', $test_id)->update([
            'views' => $views,
        ]);
        //

        $test_qa = json_decode($test_info->test_info);

        return view('tests.view_sort', compact('test_info', 'test_qa'));
    }
    
    public function delete_test($test_info_id){

        //dd($test_info_id);

        //Удаляем test_info
        //DB::table('tests_info')->where('id', $test_info_id)->delete();


        $questions = DB::table('tests_questions')->where('test_id', $test_info_id)->get();
        //dd($questions);

        foreach($questions as $question){
            if($question->question_type == "Множинний вибір"){
                DB::table('tests_multiple_choice')->where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Правильно/неправильно"){
                DB::table('tests_true_false')->where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Краткий ответ"){
                DB::table('tests_short_answer')->where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Перетягування в тексті"){ 
                DB::table('tests_drag_drop')->where('id', $question->test_answers_id)->delete();
            }
        }
        //Удаляем test_info
        DB::table('tests_info')->where('id', $test_info_id)->delete();

        DB::table('tests_questions')->where('test_id', $test_info_id)->delete();
        //

        return redirect('tests_controll')->with('message_success', 'Тест удален!');
    }

}
