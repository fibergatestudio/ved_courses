<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class TestsController extends Controller
{
    public function index(){

        $tests = DB::table('tests')->get();

        return view('tests.index', compact('tests') );
    }

    public function new_test(){

        return view('tests.create_test');
    }

    
    public function create_test(Request $request){

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

        return view('tests.view_test', compact('test_info', 'test_qa'));
    }

    function test_submit(Request $request, $test_id){

        $all_info = $request->all();
        //dd($all_info);

        $current_test = DB::table('tests')->where('id', $test_id)->first();
        $finished_count = $current_test->finished_count + 1;
        //dd($finished_count);

        DB::table('tests')->where('id', $test_id)->update([
            'finished_count' => $finished_count,
        ]);

        return redirect('tests_controll')->with('message_success', 'Тест успешно сдан!');
    }
}
