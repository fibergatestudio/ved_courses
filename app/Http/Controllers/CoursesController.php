<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CoursesController extends Controller
{
    public function index(){

        $courses = DB::table('courses')->get();
        
        //dd($courses);
        foreach($courses as $course){
            $creator = DB::table('users')->where('id', $course->creator_id)->first();
            $course->creator_name = $creator->name;
        }
        //dd($courses);

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

    public function edit_course($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        return view('courses.edit_course', compact('course_info') );
    }

    public function edit_course_apply($course_id, Request $request){

        DB::table('courses')->where('id',$course_id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('courses_controll')->with('message_success', 'Курс успешно изменен!');
    }

    // edit_about
    public function edit_about($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        return view('courses.edit_about', compact('course_info'));
    }
    // edit_about_apply
    public function edit_about_apply($course_id, Request $request){
        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }
    // add_lesson
    public function add_lesson($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        return view('courses.add_lesson', compact('course_info'));
    }
    // add_lesson_apply
    public function add_lesson_apply($course_id, Request $request){
        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }
    // add_question
    public function add_question($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        return view('courses.add_question', compact('course_info'));
    }
    // add_question_apply
    public function add_question_apply($course_id, Request $request){
        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }


}
