<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

use App\User;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

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
        $photo = Auth::user()->getMedia('photos')->last()->getUrl('thumb');

        return view('student.student_information', compact('student_info', 'student_full_info', 'photo'));
    }

    public function student_information_apply(Request $request){

        $all_info = $request->all();
        //dd($all_info);

        $user_id = Auth::user()->id;
        $full_name = trim($request->surname . ' ' . $request->name . ' ' . $request->patronymic);

        // Проверяем на существующего студента (Если есть в записях базы)
        $check_for_stud = DB::table('students')->where([
            ['full_name', '=', $full_name],
            ['user_id', '=', '-']
            ])->first();

        //dd($check_for_stud);
        //$is_confirmed = DB::table('users')->where('id', $user_id)->first();
        // Если студент совпал
        if($check_for_stud){
            //Удаляем текущие данные
            DB::table('students')->where('user_id', $user_id)->delete();
            // Обновляем данные и присваиваем студента к юзеру.
            DB::table('students')->where('full_name', $full_name)->update([
                'user_id' => $user_id,
                'full_name' => $full_name,
                'university_name' => $request->university_name,
                'course_number' => $request->course_number,
                'group_number' => $request->group_number,
                'student_number' => $request->student_number,
            ]);
            //Обновляем статус на "подтвержден"
            DB::table('users')->where('id', $user_id)->update([
                'status' => 'confirmed',
                'surname' => $request->surname,
                'name' => $request->name,
                'patronymic' => $request->patronymic,
            ]);

        // Если студент не совпал - обновляем инфуормацию. (Все еще будет нуждаться в подтверждении)
        } else {
            
            DB::table('students')->where('user_id', $user_id)->update([
                'full_name' => $full_name,
                'university_name' => $request->university_name,
                'course_number' => $request->course_number,
                'group_number' => $request->group_number,
                'student_number' => $request->student_number,
            ]);
            DB::table('users')->where('id', $user_id)->update([
                'surname' => $request->surname,
                'name' => $request->name,
                'patronymic' => $request->patronymic,
            ]);
        }

        if (isset($request->photo)) {
            $user = User::where('id', $user_id)->first();
            $user->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        // DB::table('students')->where('user_id', $request->student_id)->update([
        //     'full_name' => $request->full_name,
        //     'university_name' => $request->university_name,
        //     'course_number' => $request->course_number,
        //     'group_number' => $request->group_number,
        //     'student_number' => $request->student_number,
        // ]);

        return redirect()->back()->with('message_success', 'Информация обновлена!');

    }

    public function student_information_change_password(Request $request){
        /*$validatedData = $request->validate([
            'oldpass' => 'required|min:8',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
        ],[
            'oldpass.required' => 'Old password is required',
            'oldpass.min' => 'Old password needs to have at least 8 characters',
            'password.required' => 'Password is required',
            'password.min' => 'Password needs to have at least 8 characters',
            'password_confirmation.required' => 'Passwords do not match'
        ]);*/

        $current_password = \Auth::User()->password;
        if(\Hash::check($request->input('oldpass'), $current_password))
        {
            $user_id = \Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = \Hash::make($request->input('password'));
            $obj_user->save();
            return redirect()->back()->with('message_success', 'Пароль оновлен!');
        }
        else
        {
            return redirect()->back()->with('message_error', 'Введіть правильний пароль');
        }
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

    public function student_tests(){

        //dd("student_Tests");
        $tests = DB::table('tests')->where('is_enabled', 'true')->get();

        return view('student.student_tests', compact('tests') );
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

    public function assigned_students(){

        $teacher_id = Auth::user()->id;

        $teacher_students = DB::table('students')->where('assigned_teacher_id', $teacher_id)->get();
        foreach($teacher_students as $student){

            $student_info = DB::table('users')->where('id', $student->user_id)->first();

            $student->email = $student_info->email;
            $student->login = $student_info->name;
        }

        return view('student.assigned_students', compact('teacher_students') );
    }

    public function completed_tests($student_id){

        //dd($student_id);

        $student_info = DB::table('students')->where('user_id', $student_id)->first();
        //dd($student_info);
        return view('student.completed_student_tests', compact('student_info') );
    }

    public function import_students(){

        return view('student.students_import');
    }

    public function import_students_apply(Request $request) 
    {
        // Получаем всю инфу с запроса
        $all_info = $request->all();
        // Файл импорта
        $file = $request->file('import_file');
        // Формируем из экселя аррей
        $data = Excel::toArray(new StudentsImport, $file);

        foreach($data as $row){
            foreach($row as $column_data){
                //dd($column_data['data_zavantazennya']);
                // Проверяем на существующую запись
                $copy_check = DB::table('students_data')->where('ID_FO', $column_data['id_fo'])->first();

                if($copy_check){

                } else {
                    DB::table('students_data')->insert([
                        'upload_date' => $column_data['data_zavantazennya'], 
                        'status_from' => $column_data['status_z'], 
                        'ID_FO' => $column_data['id_fo'],
                        'recipient' => $column_data['zdobuvac'],
                        'birthday' => $column_data['data_narodzennya'],
                        'gender' => $column_data['stat'],
                        'citizenship' => $column_data['gromadyanstvo'],
                        'specialty' => $column_data['specialnist'],
                        'reason_for_deduction' => $column_data['pricina_vidraxuvannya'],
                    ]);
                }
            }
        }
        
        return redirect()->back()->with('message_success', 'Импорт успешен!');
    }

}
