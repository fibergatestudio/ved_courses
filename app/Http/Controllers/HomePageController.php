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
        return view('front.student_profile');
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
}
