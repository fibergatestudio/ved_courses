<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class TeacherController extends Controller
{

    public function index(){

        return view('teacher.index');
    }


    public function teacher_information(){

        $teacher_id = Auth::user()->id;
        //dd($teacher_id);

        $teacher_info = DB::table('users')->where('id', $teacher_id)->first();

        $teacher_full_info = DB::table('teachers')->where('user_id', $teacher_id)->first();

        return view('teacher.teacher_information', compact('teacher_info', 'teacher_full_info'));
    }


    public function teacherItemCourses()
    {
        return view('front.welcome');
    }


    public function teacherProfile()
    {
        $teacher_info = DB::table('users')->where('id', Auth::user()->id)->first();
        $teacher_info->full_name = trim($teacher_info->surname . ' ' . $teacher_info->name . ' ' . $teacher_info->patronymic);
        $teacher = DB::table('teachers')->where('user_id', Auth::user()->id)->first();
        $teacher_info->descr = $teacher->descr;
        return view('front.teacher_profile', compact('teacher_info'));
    }


    public function teacherSetting()
    {
        $teacher_info = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('teacher.teacher_setting', compact('teacher_info'));
    }


    public function teacher_information_apply(Request $request){

        $user_id = Auth::user()->id;

        if (isset($request->photo)) {
            $types = array(1 => 'gif', 2 => 'jpg', 3 => 'png');
            $data = getimagesize($request->photo);
            if (!array_key_exists($data[2], $types))
            {
                return redirect()->back()->with('message_error', 'Неприпустимий тип файлу. Припустимо завантажувати тільки зображення: *.gif, *.png, *.jpg');
            }
            $filesize = filesize($request->photo);
            if ($filesize > 1000000)
            {
                return redirect()->back()->with('message_error', 'Перевищен максимальний розмір файлу в 1 Мб');
            }
            $user = User::where('id', $user_id)->first();
            $user->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        if(empty($request->email) and empty(auth()->user()->provider_id))
        {
            return redirect()->back()->with('message_error', 'Введіть поштову скриньку');
        }

        if(auth()->user()->provider_id)
        {
           $request['email'] = auth()->user()->email;
        }

        $all_info = $request->all();

        $full_name = trim($request->surname . ' ' . $request->name . ' ' . $request->patronymic);

        // Проверяем на существующего учителя (Если есть в записях базы)
        $check_for_stud = DB::table('teachers')->where([
            ['full_name', '=', $full_name],
            ['user_id', '=', '-']
            ])->first();

        // Если учитель совпал
        if($check_for_stud){
            //Удаляем текущие данные
            DB::table('teachers')->where('user_id', $user_id)->delete();
            // Обновляем данные и присваиваем учителя к юзеру.
            DB::table('teachers')->where('full_name', $full_name)->update([
                'user_id' => $user_id,
                'full_name' => $full_name,
            ]);
            //Обновляем статус на "подтвержден"
            DB::table('users')->where('id', $user_id)->update([
                'status' => 'confirmed',
                'email' => $request->email,
            ]);

        // Если учитель не совпал - обновляем инфуормацию. (Все еще будет нуждаться в подтверждении)
        } else {

            DB::table('teachers')->where('user_id', $user_id)->update([
                'full_name' => $full_name,
            ]);
            DB::table('users')->where('id', $user_id)->update([
                'email' => $request->email,
            ]);
        }

        return redirect()->back()->with('message_success', 'Інформація оновлена!');
    }


    public function teacher_descr_apply(Request $request){
        $user_id = Auth::user()->id;
        DB::table('teachers')->where('user_id', $user_id)->update([
            'descr' => $request->profile_text,
        ]);
        return redirect()->back()->with('message_success', 'Інформація оновлена!');
    }


    public function teacher_information_change_password(Request $request){

        $current_password = \Auth::User()->password;
        if($request->password != $request->password_confirmation)
        {
            return redirect()->back()->with('message_error', 'Новий пароль не збігається з повторним');
        }
        else if(\Hash::check($request->oldpass, $current_password))
        {
            $user_id = \Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = \Hash::make($request->password);
            $obj_user->save();
            return redirect()->back()->with('message_success', 'Пароль оновлен!');
        }
        else
        {
            return redirect()->back()->with('message_error', 'Введіть правильний пароль');
        }
    }
}
