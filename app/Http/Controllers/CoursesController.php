<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CoursesController extends Controller
{
    public function index(){

        $courses = DB::table('courses')->get();

        return view('courses.index', compact('courses') );
    }

    public function new_course(){

        return view('courses.create_course');
    }

    
    public function create_course(Request $request){

        $all_info = $request->all();

        DB::table('courses')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'creator_id' => Auth::user()->id,
        ]);
        
        return redirect('courses_controll')->with('message_success', 'Курс успешно создан!');
    }

}
