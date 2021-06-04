<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Teachers;

class TeacherController extends Controller
{

    // Индекс
    public function index(){

        return view('teacher.index');
    }

    // Информация учитилей
    public function teacher_information(){

        // Получаем айди юзера
        $teacher_id = Auth::user()->id;
        // Получаем инфу учителя
        $teacher_info = User::where('id', $teacher_id)->first();
        // Получаем полную инфу учителя
        $teacher_full_info = Teachers::where('user_id', $teacher_id)->first();

        return view('teacher.teacher_information', compact('teacher_info', 'teacher_full_info'));
    }

    // Профиль учителя
    public function teacherProfile()
    {
        // Получаем всю инфу юзера
        $teacher_info = User::where('id', Auth::user()->id)->first();
        // Собираем полное имя
        $teacher_info->full_name = trim($teacher_info->surname . ' ' . $teacher_info->name . ' ' . $teacher_info->patronymic);
        // Получаем всю инфу учтиеля
        $teacher = Teachers::where('user_id', Auth::user()->id)->first();
        $teacher_info->descr = $teacher->descr;

        return view('front.teacher_profile', compact('teacher_info'));
    }

    // Настройки учителя
    public function teacherSetting()
    {
        $teacher_info = User::where('id', Auth::user()->id)->first();

        return view('teacher.teacher_setting', compact('teacher_info'));
    }

    // Применение изменений учителя
    public function teacher_information_apply(Request $request){

        // Получаем айди юзера
        $user_id = Auth::user()->id;

        // Если в запросе есть фото
        if (isset($request->photo)) {
            // Список разрешенных форматов
            $types = array(1 => 'gif', 2 => 'jpg', 3 => 'png');
            // Размер фото
            $data = getimagesize($request->photo);
            // Сравнения формата файла
            if (!array_key_exists($data[2], $types))
            {
                // Если формат не совпадает - возвращаем ошибку
                return redirect()->back()->with('message_error', 'Неприпустимий тип файлу. Припустимо завантажувати тільки зображення: *.gif, *.png, *.jpg');
            }
            // Проверка размера файла
            $filesize = filesize($request->photo);
            if ($filesize > 5000000)
            {
                // Если размер файла превышает 5 мб - возвращаем ошибку
                return redirect()->back()->with('message_error', 'Перевищен максимальний розмір файлу в 5 Мб');
            }
            // Получаем айди юзера и добавляем ему фото
            $user = User::where('id', $user_id)->first();
            $user->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        // Проверка на введенный имей
        if(empty($request->email) and empty(auth()->user()->provider_id))
        {
            // Если имейл НЕ введен - возвращаем ошибку
            return redirect()->back()->with('message_error', 'Введіть поштову скриньку');
        }

        // Если есть айди провайдера
        if(auth()->user()->provider_id)
        {
            // Присваиваем мыло к запросу
           $request['email'] = auth()->user()->email;
        }

        // Получаем всю инфу
        $all_info = $request->all();

        // Формируем полное ФИО
        $full_name = trim($request->surname . ' ' . $request->name . ' ' . $request->patronymic);

        // Проверяем на существующего учителя (Если есть в записях базы)
        $check_for_stud = Teachers::where([
            ['full_name', '=', $full_name],
            ['user_id', '=', '-']
            ])->first();

        // Если учитель совпал
        if($check_for_stud){
            //Удаляем текущие данные
            Teachers::where('user_id', $user_id)->delete();
            // Обновляем данные и присваиваем учителя к юзеру.
            Teachers::where('full_name', $full_name)->update([
                'user_id' => $user_id,
                'full_name' => $full_name,
            ]);
            //Обновляем статус на "подтвержден"
            User::where('id', $user_id)->update([
                'status' => 'confirmed',
                'email' => $request->email,
            ]);

        // Если учитель не совпал - обновляем инфуормацию. (Все еще будет нуждаться в подтверждении)
        } else {

            Teachers::where('user_id', $user_id)->update([
                'full_name' => $full_name,
            ]);
            User::where('id', $user_id)->update([
                'email' => $request->email,
            ]);
        }

        return redirect()->back()->with('message_success', 'Інформація оновлена!');
    }

    // Применяем изменения описание учителя 
    public function teacher_descr_apply(Request $request){
        $user_id = Auth::user()->id;
        Teachers::where('user_id', $user_id)->update([
            'descr' => $request->profile_text,
        ]);
        return redirect()->back()->with('message_success', 'Інформація оновлена!');
    }

    // Обновление пароля учителя
    public function teacher_information_change_password(Request $request){
        
        // Получаем текущий пароль
        $current_password = \Auth::User()->password;

        // Проверяем совпадает ли пароль с повторным паролем
        if($request->password != $request->password_confirmation)
        {
            // Если нет - выдаем ошибку
            return redirect()->back()->with('message_error', 'Новий пароль не збігається з повторним');
        }
        // если совпадает
        else if(\Hash::check($request->oldpass, $current_password))
        {
            // Обновляем пароль
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
