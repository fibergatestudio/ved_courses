<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomePageController extends Controller
{

    public function welcome(){

        $courses = DB::table('courses')->get();

        return view('front.main', compact('courses'));
    }

    public function simulator()
    {
        return view('front.simulator');
    }

    public function welcome_page()
    {
        return view('front.welcome');
    }

    public function welcome2_page()
    {
        return view('front.welcome2');
    }

    public function student_profile()
    {
        $student_id = Auth::user()->id;
        $student_info = DB::table('users')->where('id', $student_id)->first();
        $student_full_info = DB::table('students')->where('user_id', $student_id)->first();
        $student_info->full_name = trim($student_info->surname . ' ' . $student_info->name . ' ' . $student_info->patronymic);
        return view('front.student_profile', compact('student_info', 'student_full_info'));
    }

    public function view_course($course_id){

        //dd($course_id);
        $auth_id = Auth::user();
        //dd($auth_id->id);
        if($auth_id){
            //dd($auth_id);
            $user_info = DB::table('users')->where('id', $auth_id->id)->first();

            return view('courses.view_course', compact('course_id', 'user_info'));
        } else {

            return view('courses.view_course', compact('course_id'));
        }
        //dd($auth_id);

        //return view('courses.view_course', compact('course_id'));
    }

    public function aboute_course()
    {
        return view('front.aboute_course');
    }

    public function student_settings()
    {
        return view('front.student_settings');
    }

    public function program()
    {
        return view('front.program');
    }

    public function protocol()
    {
        return view('front.protocol');
    }

    public function questions()
    {
        return view('front.questions');
    }

    public function strings()
    {
        return view('front.strings');
    }

    public function teachers()
    {
        return view('front.teachers');
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

    public function video_collection()
    {
        return view('front.video_collection');
    }
}
