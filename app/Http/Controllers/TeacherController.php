<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class TeacherController extends Controller
{
    

    public function index(){


        return view('teacher.index');
    }

    public function teacher_information(){

        
        $teacher_id = Auth::user()->id;
        //dd($student_id);

        $teacher_info = DB::table('users')->where('id', $teacher_id)->first();

        $teacher_full_info = DB::table('teachers')->where('user_id', $teacher_id)->first();

        return view('teacher.teacher_information', compact('teacher_info', 'teacher_full_info'));
    }
}
