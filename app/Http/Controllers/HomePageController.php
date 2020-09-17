<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomePageController extends Controller
{
    
    public function welcome(){

        $courses = DB::table('courses')->get();
        
        return view('welcome', compact('courses'));
    }

    public function view_course($course_id){

        //dd($course_id);
        $auth_id = Auth::user();
        //dd($auth_id->id);
        if($auth_id){
            //dd($auth_id);
            $user_info = DB::table('users')->where('id', $auth_id->id)->first();
            //dd($user_info);
            if($user_info->role == 'student'){
                $student_info = DB::table('students')->where('user_id', $user_info->id)->first();
                $user_info->status = $student_info->status;
            } else if($user_info->role == 'teacher'){
                $teacher_info = DB::table('teachers')->where('user_id', $user_info->id)->first();
                $user_info->status = $teacher_info->status;
            } else {
                $user_info->status = 'confirmed';
            }
            //dd($user_info);

            return view('courses.view_course', compact('course_id', 'user_info'));
        } else {
            
            return view('courses.view_course', compact('course_id'));
        }
        //dd($auth_id);

        //return view('courses.view_course', compact('course_id'));
    }
}
