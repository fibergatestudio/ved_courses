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

        //dd($request->course_image);
        //$img_path = $request->course_image;

        if($request->hasFile('course_image')){
            $filename = time().'.'.request()->course_image->getClientOriginalExtension();
            request()->course_image->move(public_path('images'), $filename);
        }else{
            $filename = "";
        }

        //$user->image=$filename;
        //$user->save();

        DB::table('courses')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'course_image_path' => $filename,
            'creator_id' => Auth::user()->id,
            'visibility' => 'all',
        ]);
        
        return redirect('courses_controll')->with('message_success', 'Курс успешно создан!');
    }

    public function edit_course($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        $courses_question_answers = DB::table('courses_faq')->where('course_id', $course_id)->get();
        //dd($courses_question_answers);

        $course_lessons = DB::table('courses_program')->where('id', $course_id)->get();

        return view('courses.edit_course', compact('course_info', 'courses_question_answers', 'course_lessons') );
    }

    public function edit_course_apply($course_id, Request $request){

        //dd($request->visibility);

        DB::table('courses')->where('id',$course_id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'visibility' => $request->visibility,
        ]);

        return redirect('courses_controll')->with('message_success', 'Курс успешно изменен!');
    }

    // edit_about
    public function edit_about($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        $course_i = DB::table('courses_information')->where('course_id', $course_id)->first();

        return view('courses.edit_about', compact('course_info', 'course_i'));
    }
    // edit_about_apply
    public function edit_about_apply($course_id, Request $request){

        //dd($request->all());
        // Делаем аррей из пунктов
        $courses_arr = json_encode($request->course_learn, JSON_UNESCAPED_UNICODE);
        //dd($courses_arr);

        // Добавляем в базу.
        DB::table('courses_information')->insert([
            'course_id' => $course_id,
            'course_description' => $request->course_description,
            'course_learn_arr' => $courses_arr,
        ]);

        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }
    // add_lesson
    public function add_lesson($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first(); 

        return view('courses.add_lesson', compact('course_info'));
    }
    // add_lesson_apply
    public function add_lesson_apply($course_id, Request $request){

        //dd($request->all());

        DB::table('courses_program')->insert([
            'course_id' => $course_id,
            'course_description' => $request->course_description,
            'learning_time' => $request->learning_time,
            'course_protocol_descr' => $request->course_protocol_descr,
            'learning_protocol_time' => $request->learning_protocol_time,
            'add_document' => $request->add_document,
            'video_name' =>  $request->video_name,
            'video_length' => $request->video_length,
            'video_file' =>  $request->video_file,
            'video_link' => $request->video_link,
            'test_id' => '0',
        ]);
        
        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }
    // add_question
    public function add_question($course_id){

        $course_info = DB::table('courses')->where('id', $course_id)->first();

        return view('courses.add_question', compact('course_info'));
    }
    // add_question_apply
    public function add_question_apply($course_id, Request $request){

        //dd($request->all());

        $q_counter = $request->questions_counter;

        for($i = 0; $i <= $q_counter; $i++){
            //echo $i;
            $c_course_question = 'course_question' . $i;
            $c_course_answer = 'course_answer' . $i;
            //dd($c_course_question);
            DB::table('courses_faq')->insert([
                'course_id' => $course_id,
                'course_question' => $request->$c_course_question,
                'course_answer' => $request->$c_course_answer,
            ]);
        }

        // DB::table('courses_faq')->insert([
        //     'course_id' => $course_id,
        //     'course_question' => $request->course_question,
        //     'course_answer' => $request->course_answer,
        // ]);

        return redirect('courses_controll')->with('message_success', 'Курс успешно обновлен!');
    }


}
