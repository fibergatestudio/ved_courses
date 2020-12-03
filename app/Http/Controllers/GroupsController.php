<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Groups;

class GroupsController extends Controller
{
    public function index(){

        $groups = DB::table('groups')->get();

        foreach($groups as $group){
            $ids = json_decode($group->students_array);

            $all_info = array();
            foreach($ids as $id){
                $full_info = DB::table('students')->where('user_id', $id)->first();
                array_push($all_info, $full_info);
            }
            $group->students_array = $all_info;
        }

        // dd($groups);

        return view('groups.index', compact('groups'));
    }

    public function add_group(){

        $teachers_list = DB::table('users')->where('role', 'teacher')->get();

        return view('groups.add_group', compact('teachers_list') );
    }

    public function add_group_apply(Request $request){

        $all_info = $request->all();

        // dd($all_info);
        // Создаем аррей студентов
        $students_array = array();


        foreach($request->student_name as $student){
            // Получаем информацию о студенте
            $stud_info = DB::table('students')->where('full_name', $student)->first();
            // Заносим данные в аррей
            if(isset($stud_info)){
                array_push($students_array, $stud_info->user_id);
            } else {
                return redirect()->back()->with('message_error', 'Студента не существует!');
            }

        }


        // Получаем информацию о учителе
        $teacher = DB::table('users')->where('id', $request->teacher_id)->first();

        if(isset($teacher)){
            $teacher_id = $teacher->id;
            $teacher_name = $teacher->name;
        } else {
            $teacher_id = '';
            $teacher_name = '';
        }

        // Создаем новую группу
        $new_group = new Groups();
        $new_group->name = $request->name;
        $new_group->students_array = json_encode($students_array);
        $new_group->assigned_teacher_id = $teacher_id;
        $new_group->assigned_teacher_name = $teacher_name;
        $new_group->save();

        return redirect('groups');
    }

    public function edit_group($group_id){

        $group_info = DB::table('groups')->where('id', $group_id)->first();
        // dd($group_info);

        $students_ids = json_decode($group_info->students_array);
        // dd($students_ids);
        $students_array = array();
        foreach($students_ids as $student_id){
            $student = DB::table('students')->where('user_id', $student_id)->first();
            $assigned_teacher = DB::table('users')->where('id', $student->assigned_teacher_id)->first();
            if($assigned_teacher){
                $student->teacher_fio = $assigned_teacher->surname . " " . $assigned_teacher->name . " " . $assigned_teacher->patronymic;
            }
            $student_user = DB::table('users')->where('id', $student_id)->first();
            if($student_user){
                $student->student_email = $student_user->email;
                /*Дубляж на всякий полного имени студента из таблицы пользователей*/
                $student->full_name = $student_user->surname . " " . $student_user->name . " " . $student_user->patronymic;
            }
            array_push($students_array, $student);
        }

        $teachers = DB::table('users')->where('role', 'teacher')->get();
        // dd($students_array, $group_info, $teachers);

        return view('groups.edit_group', compact('group_info', 'teachers', 'students_array'));
    }

    public function apply_edit_group($group_id, Request $request){

        $post_info = $request->all();

        // dd($post_info);

        // Создаем аррей студентов
        $students_array = array();

        if(!empty($request->student_name)) {
            foreach($request->student_name as $student){
                // Получаем информацию о студенте
                $stud_info = DB::table('students')->where('full_name', $student)->first();
                // Заносим данные в аррей
                array_push($students_array, $stud_info->user_id);
            }
        }
        // Получаем информацию о учителе
        $teacher = DB::table('users')->where('id', $request->teacher_id)->first();

        if(isset($teacher)){
            $teacher_id = $teacher->id;
            $teacher_name = $teacher->name;
        } else {
            $teacher_id = '';
            $teacher_name = '';
        }

        DB::table('groups')->where('id', $group_id)->update([
            'name'  => $request->name,
            'students_array' => json_encode($students_array),
            'assigned_teacher_id' => $teacher_id,
            'assigned_teacher_name' => $teacher_name,
        ]);

        return back();
        //return redirect('groups');
    }

    public function delete_group($group_id){

        DB::table('groups')->where('id', $group_id)->delete();

        return redirect()->back()->with('message_success', 'Группа удалена!');
    }

    // Автокомплит
    public function fetch(Request $request){

        //$arr = [];
        $test = $request->students;
        $arr = explode(',', $test);
        if($test != NULL){
            //$arr[] = $test;
            //array_push($arr, $test);
        }

        //var_dump($arr);
        //echo $test;

        if($request->get('query'))
        {
            $query = $request->get('query');
            // if($arr != null){
            //     $data = DB::table('students')
            //         ->where('full_name', 'LIKE', "%{$query}%")
            //         ->whereNotIn('full_name', $arr)
            //         ->get();
            // } else {
                $data = DB::table('students')
                ->where('full_name', 'LIKE', "%{$query}%")
                ->whereNotIn('full_name', $arr)
                ->get();
            //}


            $output = '<ul class="dropdown-menu-list" style="display:block; position:relative">';
            foreach($data as $row) {
                $output .= '
                <li><a href="#">'.$row->full_name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
