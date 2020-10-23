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

        return view('tests.create_test_info');
    }

    public function create_new_test_info(Request $request){

        //dd($request->all());

        // View OPTIONS

        $array_1 = [];
        $attempt_1         = $request->has('1_attempt');
        $right_1            = $request->has('1_right');
        $score_1            = $request->has('1_score');
        $overall_comment_1  = $request->has('1_overall_comment');
        $right_answer_1     = $request->has('1_right_answer');
        $overall_review_1   = $request->has('1_overall_review');
        $array_1 = [ 
            '1_attempt' => $attempt_1, 
            '1_right' => $right_1, 
            '1_score' => $score_1, 
            '1_overall_comment' => $overall_comment_1, 
            '1_right_answer' => $right_answer_1, 
            '1_overall_review' => $overall_review_1
        ];

        $array_2 = [];
        $attempt_2          = $request->has('2_attempt');
        $right_2            = $request->has('2_right');
        $score_2            = $request->has('2_score');
        $overall_comment_2  = $request->has('2_overall_comment');
        $right_answer_2     = $request->has('2_right_answer');
        $overall_review_2   = $request->has('2_overall_review');
        $array_2 = [ 
            '2_attempt' => $attempt_2, 
            '2_right' => $right_2, 
            '2_score' => $score_2, 
            '2_overall_comment' => $overall_comment_2, 
            '2_right_answer' => $right_answer_2, 
            '2_overall_review' => $overall_review_2
        ];

        $array_3 = [];
        $attempt_3          = $request->has('3_attempt');
        $right_3            = $request->has('3_right');
        $score_3            = $request->has('3_score');
        $overall_comment_3  = $request->has('3_overall_comment');
        $right_answer_3     = $request->has('3_right_answer');
        $overall_review_3   = $request->has('3_overall_review');
        $array_3 = [ 
            '3_attempt' => $attempt_3, 
            '3_right' => $right_3, 
            '3_score' => $score_3, 
            '3_overall_comment' => $overall_comment_3, 
            '3_right_answer' => $right_answer_3, 
            '3_overall_review' => $overall_review_3
        ];

        $options_array = ['after_try' => $array_1, 'when_open' => $array_2, 'after_test_close' => $array_3];
        $options_json = json_encode($options_array);
        //dd($options_array);


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
            // Макет
            'new_page'                  => $request->new_page,
            'transition_method'         => $request->transition_method,
            // Поведение вопросов
            'random_answers_order'      => $request->random_answers_order,
            'getting_result'            => $request->getting_result,
            // Параметры просмотра
            'view_options'              => $options_json,
            // Вид
            'photo_and_student_name'    => $request->photo_and_student_name,
            // Разширенный ответ
            'extended_feedback'          => $request->extended_feedback,
            // Общие настройки модуля
            'availability'              => $request->availability,
            'operating_mode'            => $request->operating_mode,

        ]);
        // Создаем тест и редиректим на добавление вопроса
        return \Redirect::route('question_type', $test_info_id)->with('message', 'State saved correctly!!!');
    }

    public function question_type($test_info_id){

        return view('tests.question_type', compact('test_info_id'));
    }
    public function question_type_submit($test_info_id, Request $request){

        //dd($request->all());
        $question_type = $request->question_type;

        if($question_type == "Множественный выбор"){
            return \Redirect::route('multiple_choice', $test_info_id);
            //return view('tests.create_multiple_choice', compact('test_info_id'));
        } else if ($question_type == "Верно\Не верно"){
            return \Redirect::route('true_false', $test_info_id);
            //return view('tests.create_true_false', compact('test_info_id'));
        } else if ($question_type == "Краткий ответ"){
            return \Redirect::route('short_answer', $test_info_id);
            //return view('tests.create_short_answer', compact('test_info_id'));
        } else if ($question_type == "Перетаскивание в тексте"){
            return \Redirect::route('drag_drop', $test_info_id);
            //return view('tests.create_drag_drop', compact('test_info_id'));
        }


    }

    public function add_multiple_choice($test_info_id){

        return view('tests.create_multiple_choice', compact('test_info_id'));
    }

    public function create_multiple_choice($test_info_id, Request $request){

        $q_type = "Множественный выбор";

        // Если тип вопроса "множественный выбор"
        //if($request->question_type == 'Множественный выбор'){

            // Формирование Инфы для джсона
            $a_data = "";

            // Енкод инфы
            $answers_json = json_encode($a_data);

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


        return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
    }

    public function true_false($test_info_id){

        return view('tests.create_true_false', compact('test_info_id'));
    }

    public function create_true_false($test_info_id, Request $request){

        $q_type = "Верно\Не верно";

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

        return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
        
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

        return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
        
    }

    public function drag_drop($test_info_id){

        return view('tests.create_drag_drop', compact('test_info_id'));
    }

    public function create_drag_drop($test_info_id, Request $request){

        $q_type = "Перетаскивание в тексте";
        // Формирование Инфы для джсона
        $a_data = "";

        // Енкод инфы
        $answers_json = json_encode($a_data);

        // Добавляем вопроса в базу
        $insrt_id = DB::table('tests_drag_drop')->insertGetId([
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

        return redirect('tests_controll')->with('message_success', 'Вопрос успешно добавлен!');
    }

    // Просмотр теста вопросов\ответов 
    public function view_test_info_questions($test_info_id){

        // Получаем информацию о тесте.
        $test_view_info = DB::table('tests_info')->where('id', $test_info_id)->first();
        $test_question_answers = DB::table('tests_questions')->where('test_id', $test_info_id)->get();

        // Подтяжка вопросов\ответов
        foreach($test_question_answers as $t_quest){
            // Если тип вопроса множественнный выбор
            if($t_quest->question_type == "Множественный выбор"){
                $answer_info = DB::table('tests_multiple_choice')->where('id', $t_quest->test_answers_id)->first();
                $t_quest->question_name = $answer_info->question_name;
            }
            if($t_quest->question_type == "Верно\Не верно"){
                $answer_info = DB::table('tests_true_false')->where('id', $t_quest->test_answers_id)->first();
                $t_quest->question_name = $answer_info->question_name;
            }
            if($t_quest->question_type == "Краткий ответ"){
                $answer_info = DB::table('tests_short_answer')->where('id', $t_quest->test_answers_id)->first();
                $t_quest->question_name = $answer_info->question_name;
            }
            if($t_quest->question_type == "Перетаскивание в тексте"){
                $answer_info = DB::table('tests_drag_drop')->where('id', $t_quest->test_answers_id)->first();
                $t_quest->question_name = $answer_info->question_name;
            }

        }

        //dd($test_question_answers);

        return view('tests.view_test_info_questions', compact('test_info_id', 'test_view_info', 'test_question_answers'));
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
            if($question->question_type == "Множественный выбор"){
                DB::table('tests_multiple_choice')->where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Верно\Не верно"){
                DB::table('tests_true_false')->where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Краткий ответ"){
                DB::table('tests_short_answer')->where('id', $question->test_answers_id)->delete();
            } else if($question->question_type == "Перетаскивание в тексте"){ 
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
