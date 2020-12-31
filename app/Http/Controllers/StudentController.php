<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $courses = DB::table('courses')->get();

        return view('student.student_information', compact('student_info', 'student_full_info', 'courses'));
    }

    public function student_information_apply(Request $request){

        $user_id = Auth::user()->id;

        if (isset($request->photo)) {
            $types = array(1 => 'gif', 2 => 'jpg', 3 => 'png');
            $data = getimagesize($request->photo);
            if (!array_key_exists($data[2], $types))
            {
                return redirect()->back()->with('message_error', 'Неприпустимий тип файлу. Припустимо завантажувати тільки зображення: *.gif, *.png, *.jpg');
            }
            $filesize = filesize($request->photo);
            if ($filesize > 5000000)
            {
                return redirect()->back()->with('message_error', 'Перевищен максимальний розмір файлу в 5 Мб');
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
        //dd($all_info);

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
                'email' => $request->email,
                //'surname' => $request->surname,
                //'name' => $request->name,
                //'patronymic' => $request->patronymic,
            ]);

        // Если студент не совпал - обновляем информацию. (Все еще будет нуждаться в подтверждении)
        } else {

            DB::table('students')->where('user_id', $user_id)->update([
                'full_name' => $full_name,
                'university_name' => $request->university_name,
                'course_number' => $request->course_number,
                'group_number' => $request->group_number,
                'student_number' => $request->student_number,
            ]);
            DB::table('users')->where('id', $user_id)->update([
                'email' => $request->email,
                //'surname' => $request->surname,
                //'name' => $request->name,
                //'patronymic' => $request->patronymic,
            ]);
        }

        // DB::table('students')->where('user_id', $request->student_id)->update([
        //     'full_name' => $request->full_name,
        //     'university_name' => $request->university_name,
        //     'course_number' => $request->course_number,
        //     'group_number' => $request->group_number,
        //     'student_number' => $request->student_number,
        // ]);

        return redirect()->back()->with('message_success', 'Інформація оновлена!');

    }

    public function student_descr_apply(Request $request){
        $user_id = Auth::user()->id;
        DB::table('students')->where('user_id', $user_id)->update([
            'descr' => $request->profile_text,
        ]);
        return redirect()->back()->with('message_success', 'Інформація оновлена!');
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

    // Управление студентами
    public function students_controll(){

        //dd("here");
        // Получаем айди текущего юзера
        $user_id = Auth::user()->id;

        // Если Админ - берем и показываем всех студентов
        if($user_id == 1){
            $students = DB::table('students')->paginate(6);
        } else {
            // Если не админ
            // Получаем айдишники доступных студентов
            $s_ids = [];
            $groups = DB::table('groups')->where('assigned_teacher_id', $user_id)->get();

            foreach($groups as $group){

                // Перебираем все группы и если есть совпадения берем аррей студентов и передаем в общий
                $g_arr = json_decode($group->students_array);

                foreach($g_arr as $id){
                    array_push($s_ids, $id);
                }
            }

            // Берем айдишник доступные ему
            $students = DB::table('students')->where('assigned_teacher_id', $user_id)->paginate(6);
        }

        foreach($students as $student){
            //dd($student);
            $teacher_id = $student->assigned_teacher_id;
            if($teacher_id != null){
                $teacher_info = DB::table('users')->where('id',$teacher_id)->first();
                $student->assigned_teacher_id = $teacher_info->surname.' '.$teacher_info->name.' '.$teacher_info->patronymic;
            }
        }
        // Загруженные студенты
        $upld_students = DB::table('students_data')->get();
        // dd($students);
        return view('student.students_controll', compact('students', 'upld_students'));
    }

    // Удаление студента
    public function students_controll_delete($student_id){
        //dd('work in progress!!!');


        //dd($student_id);
        if(isset($student_id)){
            //проверка на существование пользователя
            $user = DB::table('users')->where('id', $student_id)->first();

            if(isset($user)){
                //обнуление связи с преподавателем
                $student = DB::table('students')->where('user_id', $student_id)->first();
                $student->assigned_teacher_id = null;
                // dd($student_id);
                //удаление из группы
                // Получаем все группы
                $groups = DB::table('groups')->get();
                // Перебираем каждую группу
                foreach($groups as $grp){
                    // Берем аррей студентов
                    $s_arr = json_decode($grp->students_array);
                    // Создаем новый пустой аррей студентов
                    $new_array = [];
                    // Перебираем всех текущих студентов группы
                    foreach($s_arr as $st){
                        // Если студент не совпадает с удаляемым - то пушим его в новый аррей
                        if($st != $student_id){
                            array_push($new_array, $st);
                        }
                    }
                    // Обновляем группу
                    DB::table('groups')->where('id', $grp->id)->update([ 'students_array' => json_encode($new_array) ]);
                }
                // УДаляем students_data если есть
                DB::table('students_data')->where('recipient', $student->full_name)->delete();
                // Удаляем студента с user
                DB::table('users')->where('id', $student_id)->delete();
                // Удаляем доп инфу студента.
                DB::table('students')->where('user_id', $student_id)->delete();
                //dd($groups, $student_id);


                return redirect()->back()->with('message_success', 'Студент був видалений!');
            }
        }
        return redirect()->back()->with('message_error', 'Студент не існує!');
    }

    public function student_tests(){

        //dd("student_Tests");
        $tests = DB::table('tests')->where('is_enabled', 'true')->get();

        return view('student.student_tests', compact('tests') );
    }


    public function students_controll_edit($student_id){

        $student = DB::table('students')->where('user_id', $student_id)->first();

        $teachers = DB::table('users')->where('role', 'teacher')->get();

        $courses = DB::table('courses')->get();

        return view('student.students_controll_edit', compact('student', 'teachers', 'courses') );
    }

    public function students_controll_apply($student_id, Request $request){

        $all_info = $request->all();
        // dd($student_id);
        if($request != NULL){
            $full_name = $request->full_name;

            DB::table('students')->where('user_id', $student_id)->update([
                'full_name' => $full_name,
                'university_name' => $request->university_name,
                'course_number' => $request->course_number,
                'group_number' => $request->group_number,
                'student_number' => $request->student_number,
                'student_phone_number' => $request->student_phone_number,
                'assigned_teacher_id' => $request->assigned_teacher_id,
            ]);

            $arr = explode(' ', $full_name);
            switch (count($arr)) {
                case '3':
                    DB::table('users')->where('id', $student_id)->update([
                        'surname' => $arr[0],
                        'name' => $arr[1],
                        'patronymic' => $arr[2],
                    ]);
                    break;
                case '2':
                    DB::table('users')->where('id', $student_id)->update([
                        'surname' => $arr[0],
                        'name' => $arr[1],
                    ]);
                    break;
                default:
                    break;
            }
            return redirect('students_controll')->with('message_success', 'Информация о студенте изменена!');
        }
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
        // Проверка верный ли формат.
        if($file->getClientOriginalExtension() == "xlsx"){
            // Формируем из экселя аррей
            $data = Excel::toArray(new StudentsImport, $file);
            //dd($data);
            foreach($data as $row){
                foreach($row as $column_data){
                    //dd($column_data['data_zavantazennya']);
                    // Проверяем на существующую запись
                    $copy_check = DB::table('students_data')->where('ID_FO', $column_data['id_fo'])->first();
                    //dd($column_data);
                    if($copy_check){

                    } else {
                        // Добавляем данные в students_data
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

                        $fio_expld = explode(" ", $column_data['zdobuvac']);
                        // Добавляем в users
                        $upld_stud_id = DB::table('users')->insertGetId([
                            'surname' => $fio_expld[0],
                            'name' => $fio_expld[1],
                            'patronymic' => $fio_expld[2],
                            'email' => $column_data['email'],
                            'password' => Hash::make($column_data['parol']),
                            'role' => 'student',
                            'status' => 'confirmed',
                        ]);

                        // Добавляем в students
                        DB::table('students')->insert([
                            'user_id' => $upld_stud_id,
                            'full_name' => $column_data['zdobuvac'],
                        ]);

                    }
                }
            }
        } else {
            return redirect()->back()->with('message_error', 'Неправильний формат файлу! Вірний формат - XLSX');
        }

        return redirect()->back()->with('message_success', 'Імпорт успішний!');
    }


    public function students_success($student_id){

        $student = DB::table('students')->where('user_id', $student_id)->first();
        $email = DB::table('users')->where('id', $student_id)->first()->email;
        $student->email = $email;

        $course_id = null;
        $course_lessons = (object)[];
        $lesson_count = null;
        $course_info = DB::table('courses')->where('name', $student->course_number)->first();
        if (is_object($course_info)) {
            $course_id = $course_info->id;
        }

        // Программа курса
        if ($course_id) {
            $course_lessons = DB::table('courses_program')->where('course_id', $course_id)->get();
            $lesson_count = $course_lessons->count();
        }

        // Видео для курса
        foreach($course_lessons as $lesson){
            if($lesson->video_name == null || $lesson->video_name == "null" ){
                $lesson->video_count = 0;
            } else {
                $lesson->video_count = count(json_decode($lesson->video_name));
            }

            //$mm = DB::table('finished_tests_info')->get();
            //dd($mm, "Stud_id: " . $student_id, "Lesson_id: " . $lesson->test_id, "Course_id: " . $course_id, $lesson);

            // Результаты теста по курсу
            if($lesson->test_id != null){
                $lesson->test_exist = true;
                // Берем инфу о законченных тестах
                $finished_test_info = DB::table('finished_tests_info')->where([
                    'user_id' => $student_id,
                    'test_id' => $lesson->test_id,
                    'course_id' => $course_id,
                ])->orderBy('total_score', 'desc')->first();
                // Аррей с инфой о результатах
                $test_results = [];
                // Проверяем есть ли результаты
                if($finished_test_info){
                    // Если есть - берем нужную информацию и передаем в аррей
                    $test_results_decode = json_decode($finished_test_info->test_questions_json);
                    $test_results['max_score'] = $test_results_decode->max_score;
                    $test_results['final_score'] = $test_results_decode->final_score;
                    $test_results['completion_percent'] = abs(
                        floor(
                            ( ( ($test_results['max_score'] - $test_results['final_score']) / ($test_results['max_score']) ) * 100 ) - 100
                        )
                    );
                    //$test_results['completion_percent'] = (1 - $test_results['max_score'] / $test_results['final_score']) * 100;
                    //app('App\Http\Controllers\HomePageController')->get_percentage($test_results['final_score'], $test_results['max_score']);
                    //(($test_results['max_score'] - $test_results['final_score']) / ($test_results['max_score'])) * 100%;
                }
                // По результатам - передаем инфу в общий аррей урока
                $lesson->test_results = $test_results;

                $test_info = DB::table('tests_info')->where('id', $lesson->test_id)->first();
                $lesson->test_info = $test_info;
                //dd($finished_test_info);
            } else {
                $lesson->test_exist = false;
                $lesson->test_results = [];
            }
        }

        $course_protocols = [];
        //Протоколы для курса
        foreach($course_lessons as $lesson){
            $current_protocol = DB::table('protocols')->where([
                                                            ['course_id', '=', $course_id],
                                                            ['lesson_id', '=', $lesson->id],
                                                            ['user_id', '=', $student_id],
                                                        ])->first();
            if($lesson->show_protocol) {
                array_push($course_protocols, $current_protocol);
            }
            else {
                array_push($course_protocols, false);
            }
        }

        // Определяем следующего студента для кнопки
        $role = Auth::user()->role;
        $user_id = Auth::user()->id;
        $students = DB::table('students')->get();
        $next_student = $student_id;

        if ($role === 'teacher') {
            $students = DB::table('students')->where('assigned_teacher_id', $user_id)->get();
        }

        for ($i=0; $i < $students->count(); $i++) {
            if ($students[$i]->user_id === $student_id) {
                if ($i + 1 < $students->count()) {
                    $next_student = $students[$i+1]->user_id;
                }
            }
        }

        return view('student.students_success', compact('student', 'next_student', 'course_lessons', 'course_info', 'lesson_count', 'course_protocols', 'student_id'));
    }

}
