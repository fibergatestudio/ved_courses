<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $t_count = 5;
        $s_count = 12;

        for($i = 0; $i < $t_count; $i++){

            $t_sur = 'Surname' . $i;
            $t_name = 'Teacher' . $i;
            $t_pat = 'Patronymic' . $i;
            $t_mail = 'teacher' . $i . '@mail.com';

            $new_teach_id = DB::table('users')->insertGetId([
                'surname' => $t_sur,
                'name' => $t_name,
                'patronymic' => $t_pat,
                'email' => $t_mail,
                'password' => Hash::make('qwerty'),
                'role' => 'teacher',
                'status' => 'confirmed',
            ]);

            DB::table('teachers')->insert([
                'user_id' => $new_teach_id,
                'full_name' => $t_sur.' '.$t_name.' '.$t_pat,
                'status' => 'confirmed',
            ]);
        }
        for($z = 0; $z < $s_count; $z++){

            $s_sur = 'Surname' . $z;

            if($z == 0){
                $s_name = 'Александр';
            } else if($z == 1){
                $s_name = 'Аркадий';
            }else if($z == 2){
                $s_name = 'Борис';
            }else if($z == 3){
                $s_name = 'Виталий';
            }else if($z == 4){
                $s_name = 'Денис';
            } else {
                $s_name = 'Student' . $z;
            }
            //$s_name = 'Student' . $z;

            $s_pat = 'Patronymic' . $z;
            $s_mail = 'student' . $z . '@mail.com';

            // Тест Пользователи
            $new_stud_id = DB::table('users')->insertGetId([
                'surname' => $s_sur,
                'name' => $s_name,
                'patronymic' => $s_pat,
                'email' => $s_mail,
                'password' => Hash::make('qwerty'),
                'role' => 'student',
                'status' => 'confirmed',
            ]);

            DB::table('students')->insert([
                'user_id' => $new_stud_id,
                'full_name' => $s_sur.' '.$s_name.' '.$s_pat,
            ]);
        }


        // Сид Users
        $teacher_id = DB::table('users')->insertGetId([
            'surname' => 'Лісніченко',
            'name' => 'Дмитро',
            'patronymic' => 'Вікторович',
            'email' => 'teacherone@mail.com',
            'password' => Hash::make('qwerty'),
            'role' => 'teacher',
            'status' => 'confirmed',
        ]);
        // Сид teachers
        DB::table('teachers')->insert([
            'user_id' => $teacher_id,
            'descr' => 'Доцент кафедри кримінального процесу Одеського державного університету внутрішніх справ, кандидат юридичних наук',
            'full_name' => 'Лісніченко Дмитро Вікторович',
            'status' => 'confirmed',
        ]);

        // Сид Courses
        $course_id = DB::table('courses')->insertGetId([
            'name' => 'Слідча практика: віртуальний огляд місця події',
            'description' => '<p>Курс допоможе Вам, знаходячись у віртуальному середовищі з повним ефектом присутності, вивчити порядок проведення оглядів місць пригод, виробити практичні навички проведення оглядів та розвинути свої аналітичні здібності в розслідуванні злочинів.</p>',
            'course_image_path' => '1608021912.jpg',
            'creator_id' => 1,
            'assigned_teacher_id' => "[". $teacher_id . "]",
            'visibility' => 'all',
        ]);

        // Сид courses_information
        DB::table('courses_information')->insert([
            'course_id' => $course_id,
            'course_description' => '<p>Курс описание 1</p>',
            'course_learn_arr' => '["<p>Порядку проведення огляду місця події<\/p>","<p>Помічати найменші деталі в навколишньому середовищі<\/p>","<p>Аналізувати візуальну інформацію та висувати версії<\/p>","<p>Особливостям складання процесуальних документів<\/p>"]',

        ]);

        // Сид tests_info
        $test_id = DB::table('tests_info')->insertGetId([
            'name' => 'По факту виявлення трупа особи',
            'description' => '',
            'when_time_is_up' => '1',
            'available_attempts' => '1',
            'assessment_method' => '1',
            'random_answers_order' => '1',
            'getting_result' => '1',
            'extended_feedback' => '{"grade_100":{"grade":"100","review":null},"grade_custom":[],"grade_0":{"grade":"0","review":null}}',
            'availability' => '1',
            'operating_mode' => '0',
        ]);
            // Сид tests_questions
            $test_q_1 = DB::table('tests_multiple_choice')->insertGetId([
                'question_name' => 'Питання 1',
                'question_text' => '<p>Детально ознайомившись з криміналістичною картиною місця події, які види слідів злочину відсутні на представленій локації:</p>',
                'answers_type' => '1',
                'number_answers' => '1',
                'answers_json' => '[{"answer":"\u0442\u0440\u0430\u0441\u043e\u043b\u043e\u0433\u0456\u0447\u043d\u0456 \u0441\u043b\u0456\u0434\u0438","answer_grade":"1","answer_comment":""},{"answer":"\u0431\u0456\u043e\u043b\u043e\u0433\u0456\u0447\u043d\u0456 \u0441\u043b\u0456\u0434\u0438","answer_grade":"1","answer_comment":""},{"answer":"\u043e\u0434\u043e\u0440\u043e\u043b\u043e\u0433\u0456\u0447\u043d\u0456 \u0441\u043b\u0456\u0434\u0438","answer_grade":"1","answer_comment":""},{"answer":"\u0431\u0430\u043b\u0456\u0441\u0442\u0438\u0447\u043d\u0456 \u0441\u043b\u0456\u0434\u0438","answer_grade":"1","answer_comment":""}]',
            ]);
            DB::table('tests_questions')->insert([
                'test_id' => $test_id,
                'question_type' => 'Множинний вибір',
                'test_answers_id' => $test_q_1,
            ]);
            $test_q_2 = DB::table('tests_multiple_choice')->insertGetId([
                'question_name' => 'Питання 2',
                'question_text' => '<p>На якої кількості поверхонь на місці події є біологічні сліди?</p>',
                'answers_type' => '1',
                'number_answers' => '1',
                'answers_json' => '[{"answer":"6","answer_grade":"1","answer_comment":""},{"answer":"8","answer_grade":"1","answer_comment":""},{"answer":"4","answer_grade":"1","answer_comment":""},{"answer":"2","answer_grade":"1","answer_comment":""}]',
            ]);
            DB::table('tests_questions')->insert([
                'test_id' => $test_id,
                'question_type' => 'Множинний вибір',
                'test_answers_id' => $test_q_2,
            ]);

        // Сид courses_program
            // 1
        DB::table('courses_program')->insert([
            'course_id' => $course_id,
            'course_name' => 'По факту виявлення трупа особи',
            'show_protocol' => 1,
            'model3d_link' => 'https://3dprostir.com/embed/reyDfzjk9PXm_N0b939vgrQ',
            'test_id' => $test_id,
        ]);
            // 2
        DB::table('courses_program')->insert([
            'course_id' => $course_id,
            'course_name' => 'По факту озброєного розбійного нападу',
            'show_protocol' => 1,
            'model3d_link' => 'https://3dprostir.com/embed/r2zN4KPXNOSaICH1-qbhCGA',
        ]);
            // 3
        DB::table('courses_program')->insert([
            'course_id' => $course_id,
            'course_name' => 'По факту самогубства',
            'show_protocol' => 1,
            'model3d_link' => 'https://3dprostir.com/embed/ru0C-Zc2pNkqG6KN5kiWoEw',
        ]);
            // 4
        DB::table('courses_program')->insert([
            'course_id' => $course_id,
            'course_name' => 'За фактом пожежі/підпалу',
            'show_protocol' => 1,
            'model3d_link' => 'https://my.matterport.com/show/?m=drTzkS821qS',
        ]);
            // 5
        DB::table('courses_program')->insert([
            'course_id' => $course_id,
            'course_name' => 'По факту квартирної крадіжки',
            'show_protocol' => 1,
            'model3d_link' => 'https://3dprostir.com/embed/rHMXtJyomPRKVM6n10DTQxA',
        ]);

    }
}
