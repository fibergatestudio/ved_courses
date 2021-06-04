<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Students;
use App\Teachers;
use App\Courses;
use App\Groups;

class AdminController extends Controller
{

    // Индекс
    public function index(){

        return view('admin.index');
    }

    // Управление пользователями cnhfybwf
    public function users_controll(){

        $users = User::paginate(6);

        return view('admin.users_controll', compact('users'));
    }

    // Редактирование пользователя страница
    public function user_edit($user_id){

        $user = User::where('id', $user_id)->first();

        if($user->role == "student"){
            $student_info = Students::where('user_id', $user->id)->first();
        } else {
            $student_info = '';
        }

        $courses = Courses::get();

        return view('admin.user_edit', compact('user', 'student_info', 'courses'));
    }
    // Редактирование пользователя применить
    public function user_edit_apply($user_id, Request $request){
        //Получаем всю информацию с запроса
        $all_info = $request->all();

        $user_info_checker = User::where('id', $user_id)->first();

        // Обновление юзера
        User::where('id', $user_id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
        ]);

        // Полное имя пользователя
        $complete_name = $user_info_checker->surname . " " .  $user_info_checker->name . " " . $user_info_checker->patronymic;

        // Если разница роей
        if($request->selected_role != $user_info_checker->role){
            // Если роль админ
            if( $user_info_checker->role == "admin"){
                //Если выбранная роль учитель
                if($request->selected_role == "teacher"){
                    // Добавляем данные о учителе
                    Teachers::insert([
                        'user_id' => $user_id,
                        'full_name' => $complete_name,
                    ]);
                //Если выбранная роль студент
                } else if ($request->selected_role == "student"){
                    // Добавляем данные о студенте
                    Teachers::insert([
                        'user_id' => $user_id,
                        'full_name' => $complete_name,
                    ]);
                }
            // Если роль учитель
            } else if( $user_info_checker->role == "teacher"){
                // Удаляем инфу о учителе
                Teachers::where('user_id', $user_id)->delete();
                    // Удаляем инфу с групп
                    Groups::where('assigned_teacher_id', $user_id)->update([
                        'assigned_teacher_id' => null,
                        'assigned_teacher_name' => null,
                    ]);
                // Если выбранная роль студент
                if ($request->selected_role == "student"){
                    // Добавляем данные о студенте
                    Students::insert([
                        'user_id' => $user_id,
                        'full_name' => $complete_name,
                    ]);
                }
            // Если роль студент
            } else if ( $user_info_checker->role == "student"){
                // Удаляем инфу о студенте
                Students::where('user_id', $user_id)->delete();
                // Если выбранная роль учитель
                if($request->selected_role == "teacher"){
                    // Добавляем данные о учителе
                    Teachers::insert([
                        'user_id' => $user_id,
                        'full_name' => $complete_name,
                    ]);
                } 
            }
            User::where('id', $user_id)->update([
                'role' => $request->selected_role,
            ]);
        }

        // Если пользователь студент - обновить
        if($request->role == "student"){
            //проверка на несоотвествие полного имени
            $full_name = $request->full_name;
            $fio = $request->surname.' '.$request->name.' '.$request->patronymic;
            if($request->full_name !== $fio){
                $full_name = $fio;
            }
            Students::where('user_id', $user_id)->update([
                'full_name' => $full_name,
                'university_name' => $request->university_name,
                'course_number' => $request->course_number,
                'group_number' => $request->group_number,
                'student_number' => $request->student_number,
                'student_phone_number' => $request->student_phone_number,
            ]);
        }

        return redirect()->back()->with('message_success', 'Користувача змінено!');
    }

    // Подтверждение учителя(перевод из сутдентов)
    public function teacher_apply($user_id){

        User::where('id', $user_id)->update([
            'status' => 'confirmed',
        ]);

        return redirect()->back()->with('message_success', 'Учитель подтвержден!');
    }
    // Удаление пользователя
    public function user_delete($user_id){

        User::where('id', $user_id)->delete();
        Students::where('user_id', $user_id)->delete();
        Teachers::where('user_id', $user_id)->delete();

        return redirect()->back()->with('message_success', 'Користувач був видалений!');
    }

}
