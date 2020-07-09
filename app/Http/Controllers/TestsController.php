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

        DB::table('tests')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'creator_id' => Auth::user()->id,
        ]);
        
        return redirect('tests_controll')->with('message_success', 'Тест успешно создан!');
    }
}
