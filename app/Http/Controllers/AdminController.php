<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    
    // Индекс
    public function index(){

        return view('admin.index');
    }

    // Управление пользователями
    public function users_controll(){

        $users = DB::table('users')->get();
        //dd($users);
        foreach ($users as $user){
            $is_temp = DB::table('students')->where('user_id', $user->id)->first();
            if($is_temp){
                $user->is_temporal = $is_temp->is_temporal;
            } else {
                $user->is_temporal = 'false';
            }
        }
        //dd($users);

        return view('admin.users_controll', compact('users'));
    }

    // Редактирование пользователя страница
    public function user_edit($user_id){

        $user = DB::table('users')->where('id', $user_id)->first();

        $is_temp = DB::table('students')->where('user_id', $user->id)->first();
        if(isset($is_temp->is_temporal)){
            $temporal_student = $is_temp->is_temporal;
        } else {
            $temporal_student = '';
        }

        if($user->role == "student" && $is_temp->is_temporal == 'false'){
            $student_info = DB::table('students')->where('user_id', $user->id)->first();
        } else {
            $student_info = '';
        }

        return view('admin.user_edit', compact('user', 'student_info', 'temporal_student'));
    }
    // Редактирование пользователя применить
    public function user_edit_apply($user_id, Request $request){
        //Получаем всю информацию с запроса
        $all_info = $request->all();
        //dd($all_info);

        $user_info_checker = DB::table('users')->where('id', $user_id)->first();

        if($user_info_checker->email != $request->email){
            DB::table('users')->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role
            ]);
        }
        
        // Если пользователь студент - обновить
        if($request->role == "student"){
            DB::table('students')->where('user_id', $user_id)->update([
                'full_name' => $request->full_name,
                'university_name' => $request->university_name,
                'course_number' => $request->course_number,
                'group_number' => $request->group_number,
                'student_number' => $request->student_number,
            ]);
        // Если пользователь учитель - обновить
        } else if ($request->role == "teacher"){
            DB::table('teachers')->where('user_id', $user_id)->update([
                // 'full_name' => $request->full_name,
                // 'university_name' => $request->university_name,
                // 'course_number' => $request->course_number,
                // 'group_number' => $request->group_number,
                // 'student_number' => $request->student_number,
            ]);
        }

        return redirect()->back()->with('message_success', 'Пользователь изменен!');
    }

    // Подтверждение учителя(перевод из сутдентов)
    public function teacher_apply($user_id){

        //dd($user_id);

        //$user_table = DB::table('users')->where('id', $user_id)->first();

        DB::table('users')->where('id', $user_id)->update([
            'role' => 'teacher',
        ]);
        DB::table('students')->where('user_id', $user_id)->delete();

        DB::table('teachers')->insert(
            ['user_id' => $user_id,
            'status' => 'confirmed'
            ]
        );
        //$temp_stunedt_table = DB::table('students')->where('user_id', $user_id)->first();




        return redirect()->back()->with('message_success', 'Учитель подтвержден!');
    }
    // Удаление пользователя
    public function user_delete($user_id){

        DB::table('users')->where('id', $user_id)->delete();
        DB::table('students')->where('user_id', $user_id)->delete();
        DB::table('teachers')->where('user_id', $user_id)->delete();

        return redirect()->back()->with('message_success', 'Пользователь удален!');
    }

}
