<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Groups;
use App\User;
use App\Students;
use App\Courses;

class GroupsController extends Controller
{
    // Индекс
    public function index(){

        // Получаем айди авторизованого пользователя
        $user_id = Auth::user()->id;
        
        // Если админ - получаем все группы, если нет то получаем присвоенные группы
        if($user_id == 1){
            $groups = Groups::get();
        } else {
            $groups = Groups::where('assigned_teacher_id', $user_id)->get();
        }
        // Перебираем группы и получаем инфу студентов
        foreach($groups as $group){
            $ids = json_decode($group->students_array);

            $all_info = array();
            foreach($ids as $id){
                $full_info = Students::where('user_id', $id)->first();
                array_push($all_info, $full_info);
            }
            $group->students_array = $all_info;
        }

        return view('groups.index', compact('groups'));
    }

    // Добавить группу Страница
    public function add_group(){
        // Получаем автризованного пользователя
        $auth_teacher = Auth::user();
        // Получаем список учитилей
        $teachers_list = User::where('role', 'teacher')->get();

        return view('groups.add_group', compact('teachers_list', 'auth_teacher') );
    }
    // Добавить группу POST
    public function add_group_apply(Request $request){

        // Получаем всю инфу с запроса
        $all_info = $request->all();

        // Создаем аррей студентов
        $students_array = array();

        // Получаем информацию о учителе
        $teacher = User::where('id', $request->teacher_id)->first();

        if(isset($teacher)){
            $teacher_id = $teacher->id;
            $teacher_name =$teacher->surname." ".$teacher->name." ".$teacher->patronymic;

            if(isset($request->student_name)){
                foreach($request->student_name as $student){
                    // Получаем информацию о студенте
                    $stud_info = Students::where('full_name', $student)->first();
                    //Заносим данные о учителе в таблицу студентов

                    // Заносим данные в аррей
                    if(isset($stud_info)){
                        Students::where('id', $stud_info->id)->update([
                            'assigned_teacher_id' => $teacher_id,
                        ]);
                        array_push($students_array, $stud_info->user_id);
                    } else {
                        return redirect()->back()->with('message_error', 'Студента не існує!')->withInput();
                    }
                }

                // Создаем новую группу
                $new_group = new Groups();

                if(isset($request->group_name)){
                    $new_group->name = $request->group_name;
                } else {
                    return redirect()->back()->with('message_error', 'Додайте назву групи!')->withInput();
                }

                $new_group->students_array = json_encode($students_array);
                $new_group->assigned_teacher_id = $teacher_id;
                $new_group->assigned_teacher_name = $teacher_name;
                $new_group->save();

                return redirect('groups');
            } else {
                return redirect()->back()->with('message_error', 'Додайте студентів!')->withInput();
            }

        } else {
            return redirect()->back()->with('message_error', 'Додайте викладача!')->withInput();
        }
    }

    // Редактирование группы
    public function edit_group($group_id){

        // Получаем инфу группы
        $group_info = Groups::where('id', $group_id)->first();

        // Если есть инфо группы
        if (isset($group_info)){
            // Декодим айдишники студентов
            $students_ids = json_decode($group_info->students_array);
            $students_array = array();
            // Перебираем все айдишники и получаем инфу студентов
            foreach($students_ids as $student_id){
                $student = Students::where('user_id', $student_id)->first();
                // Имейл студента
                $stud_email = User::where('id', $student_id)->first();
                $student->email = $stud_email->email;
                $assigned_teacher = User::where('id', $student->assigned_teacher_id)->first();

                if($assigned_teacher){
                    $student->teacher_fio = $assigned_teacher->surname . " " . $assigned_teacher->name . " " . $assigned_teacher->patronymic;
                }

                $student_user = User::where('id', $student_id)->first();

                if($student_user){
                    $student->student_email = $student_user->email;
                }
                array_push($students_array, $student);
            }

            //Привязка курса к студентам
            // Собираем доступные курсы
            $teacher_id = $group_info->assigned_teacher_id;
            $courses = Courses::get();
            $id_arr = [];
            foreach ($courses as $value) {
                // + Доп проверка есть ли привязанный учитель к группе
                if($value->assigned_teacher_id){
                   $temp_arr = json_decode($value->assigned_teacher_id);
                    if (in_array($teacher_id, $temp_arr)) {
                        $id_arr[] = $value->id;
                    }
                }
            }
            $courses= Courses::whereIn('id', $id_arr)->get();

            // Собираем доступных учителей
            $id_arr = [];
            foreach ($courses as $value) {
                $temp_arr = json_decode($value->assigned_teacher_id);
                $id_arr = array_merge($id_arr, $temp_arr);
            }

            $teachers = User::whereIn('id', $id_arr)->get();

            // Получаем инфу с текущего автозированного пользователя
            $role = Auth::user()->role;
            $user_id = Auth::user()->id;
            $auth_teacher = Auth::user();
            $course_for_js = []; 

            // Если роль юзера - учитель
            if ($role === 'teacher') {
                $id_arr = [];
                // Получаем курсы в которых учавствует учитель
                foreach ($courses as $value) {
                    $temp_arr = json_decode($value->assigned_teacher_id);
                    if (in_array($user_id, $temp_arr)) {
                        $id_arr[] = $value->id;
                    }
                }
                $courses= Courses::whereIn('id', $id_arr)->get();
            }
            else{
                foreach ($courses as $value) {
                    $course_for_js[$value->name] = json_decode($value->assigned_teacher_id);
                }
            }

            return view('groups.edit_group', compact('group_info', 'teachers', 'students_array', 'courses', 'auth_teacher', 'course_for_js'));
        } else {
            return redirect('groups_controll')->with('message_error', 'Групи не існує!');
        }

    }

    // Редактирование группы применить
    public function apply_edit_group($group_id, Request $request){

        // Получаем всю инфу с запроса
        $post_info = $request->all();

        if (isset($request->teacher_id)){
            // Получаем информацию о учителе
            $teacher = User::where('id', $request->teacher_id)->first();

            if(isset($teacher)){
                $teacher_id = $teacher->id;
                $teacher_name =$teacher->surname." ".$teacher->name." ".$teacher->patronymic;
            } else {
                return redirect()->back()->with('message_error', 'Додайте викладача!');
            }
        }
        // Создаем аррей студентов
        $students_array = array();

        if(isset($request->student_name)) {
            foreach($request->student_name as $student){
                // Получаем информацию о студенте
                $stud_info = Students::where('full_name', $student)->first();

                if(isset($stud_info)){
                    Students::where('id', $stud_info->id)->update([
                        'assigned_teacher_id' => $teacher_id,
                    ]);
                    // Заносим данные в аррей
                    array_push($students_array, $stud_info->user_id);
                } else {
                    return redirect()->back()->with('message_error', 'Студента не існує!');
                }
            }
        }

        //Привязка курса к студентам
        for ($i=0; $i < count($students_array); $i++) {
            Students::where('user_id', $students_array[$i])->update([
                'course_number'  => $request->course_number,
                'group_number' => $request->nameGroup
            ]);
        }

        Groups::where('id', $group_id)->update([
            'name'  => $request->nameGroup,
            'students_array' => json_encode($students_array),
            'assigned_teacher_id' => $teacher_id,
            'assigned_teacher_name' => $teacher_name,
            'course_number'  => $request->course_number
        ]);

        return redirect()->back()->with('message_success', 'Дані були успішно змінені!');
    }

    // Удаление группы
    public function delete_group($group_id){

        Groups::where('id', $group_id)->delete();

        return redirect()->back()->with('message_success', 'Группа удалена!');
    }

    // Автокомплит
    public function fetch(Request $request){
        //содержимое строки запроса
        $ipt_str = $request->ipt_str;
        //массив добавленных студентов
        $arr = $request->students;

        // Делаем аррей студентов которые уже в группах
        $grp_stund_arr = [];
        $grp_stud_db = Groups::get();

        foreach($grp_stud_db as $grp_stud){
            $st_arr = json_decode($grp_stud->students_array);
            foreach($st_arr as $arr_val){
                array_push($grp_stund_arr, $arr_val);
            }
        }
        $grp_stund_arr = array_unique($grp_stund_arr);

        if($ipt_str !== ''){

            if(count($arr) >= 1 ){
                $data = Students::where('full_name', 'LIKE', "%{$ipt_str}%")
                    ->whereNotIn('user_id', $grp_stund_arr)
                    ->whereNotIn('full_name', $arr)
                    ->get();

                return response()->json($data);
            }else{
                $data = Students::where('full_name', 'LIKE', "%{$ipt_str}%")
                ->whereNotIn('user_id',$grp_stund_arr)
                ->get();

                return response()->json($data);
            }
        }
    }

    // Проверка студентов
    public function fetchCheck(Request $request){

        if($request != NULL){
            $input_stud = $request->student;
            $stud_data = Students::where('full_name', $input_stud)->first();

            //добавление мыла
            $stud_user = User::where('id', $stud_data->user_id)->first();
            if($stud_user){
                $stud_data->student_email = $stud_user->email;
                $stud_data->full_name = $stud_user->surname . " " . $stud_user->name . " " . $stud_user->patronymic;
            }
            //добавление ФИО учителя
            $assigned_teacher = User::where('id', $stud_data->assigned_teacher_id)->first();

            if($assigned_teacher){
                $stud_data->teacher_fio = $assigned_teacher->surname . " " . $assigned_teacher->name . " " . $assigned_teacher->patronymic;
            }else{
                $stud_data->teacher_fio = "-";
            }

            if($stud_data != NULL){
                return response()->json($stud_data);
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    // Изменить имя группы
    public function changeGroupName(Request $request){

        if($request != NULL){
            $group_id = $request->groupId;
            $new_name = $request->nameGroup;
            //записую старое название группы
            $old_name = Groups::where('id', $group_id)->first()->name;

            if($old_name != $new_name){
                //обновляю название группы если имена разные
                Groups::where('id', $group_id)->update([
                    'name'  => $new_name,
                ]);

                return 'Назву групи "'.$old_name.'" було змінено на "'.$new_name.'"!';
            }else{
                return 'Назви груп однакові!';
            }
        }else{
            return 'Немаэ данних!';
        }
    }

    // Убрать изменение названия группы
    public function discardGroupNameChanges(Request $request){
        if($request != NULL){
            $group_id = $request->groupId;
            $old_name = Groups::where('id', $group_id)->first()->name;
            return $old_name;
        }else{
            return 'Немаэ данних!';
        }
    }

}
