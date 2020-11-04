<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{


    public function index(){

        //$teacher_id = 'test';

        return view('teacher.index');
    }

    public function teacher_information(){


        $teacher_id = Auth::user()->id;
        //dd($student_id);

        $teacher_info = DB::table('users')->where('id', $teacher_id)->first();

        $teacher_full_info = DB::table('teachers')->where('user_id', $teacher_id)->first();

        return view('teacher.teacher_information', compact('teacher_info', 'teacher_full_info'));
    }

    public function teacherItemCourses()
    {
        return view('front.welcome');
    }

    public function teacherProfile()
    {
        $teacher_info = DB::table('users')->where('id', Auth::user()->id)->first();
        $teacher_info->full_name = trim($teacher_info->surname . ' ' . $teacher_info->name . ' ' . $teacher_info->patronymic);
        return view('front.teacher_profile', compact('teacher_info'));
    }

    public function teacherInformation()
    {
        $teacher_info = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('teacher.teacher_setting', compact('teacher_info'));
    }
}
