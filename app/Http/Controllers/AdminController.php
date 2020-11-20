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

        $users = DB::table('users')->paginate(4);

        return view('admin.users_controll', compact('users'));
    }

    // Редактирование пользователя страница
    public function user_edit($user_id){

        $user = DB::table('users')->where('id', $user_id)->first();

        if($user->role == "student"){
            $student_info = DB::table('students')->where('user_id', $user->id)->first();
        } else {
            $student_info = '';
        }

        return view('admin.user_edit', compact('user', 'student_info'));
    }
    // Редактирование пользователя применить
    public function user_edit_apply($user_id, Request $request){
        //Получаем всю информацию с запроса
        $all_info = $request->all();
        //dd($all_info);

        $user_info_checker = DB::table('users')->where('id', $user_id)->first();
        //dd($user_info_checker);
        //if($user_info_checker->email != $request->email){
            DB::table('users')->where('id', $user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        //}
        
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
            //dd("Techer");
            // DB::table('teachers')->where('user_id', $user_id)->update([
            //     'status' 
            // ]);
        }

        return redirect()->back()->with('message_success', 'Пользователь изменен!');
    }

    // Подтверждение учителя(перевод из сутдентов)
    public function teacher_apply($user_id){

        DB::table('users')->where('id', $user_id)->update([
            'status' => 'confirmed',
        ]);

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
