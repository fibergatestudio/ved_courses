<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class StudentController extends Controller
{
    public function index(){


        return view('student.index');
    }

    public function student_information(){

        $student_id = Auth::user()->id;
        //dd($student_id);

        $student_info = DB::table('users')->where('id', $student_id)->first();

        $student_full_info = DB::table('students')->where('user_id', $student_id)->first();

        return view('student.student_information', compact('student_info', 'student_full_info'));
    }

    public function student_information_apply(Request $request){

        $all_info = $request->all();
        //dd($all_info);

        DB::table('students')->where('user_id', $request->student_id)->update([
            'full_name' => $request->full_name,
            'university_name' => $request->university_name,
            'course_number' => $request->course_number,
            'group_number' => $request->group_number,
            'student_number' => $request->student_number,
        ]);

        return redirect()->back()->with('message_success', 'Информация обновлена!');

    }

    // Управление студентами
    public function students_controll(){

        $students = DB::table('students')->get();

        foreach($students as $student){
            //dd($student);
            $teacher_id = $student->assigned_teacher_id;
            if($teacher_id != null){
                $teacher_info = DB::table('users')->where('id',$teacher_id)->first();
                $student->assigned_teacher_id = $teacher_info->name;
            }

        }

        return view('student.students_controll', compact('students'));
    }

    public function students_controll_edit($student_id){

        $student = DB::table('students')->where('user_id', $student_id)->first();

        $teachers = DB::table('users')->where('role', 'teacher')->get();

        return view('student.students_controll_edit', compact('student', 'teachers') );
    }

    public function students_controll_apply($student_id, Request $request){

        $all_info = $request->all();
        //dd($all_info);

        DB::table('students')->where('user_id', $student_id)->update([
            'full_name' => $request->full_name,
            'university_name' => $request->university_name,
            'course_number' => $request->course_number,
            'group_number' => $request->group_number,
            'student_number' => $request->student_number,
            'assigned_teacher_id' => $request->assigned_teacher_id,
        ]);

        return redirect('students_controll')->with('message_success', 'Информация о студенте изменена!');
    }

}
