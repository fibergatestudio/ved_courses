<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomePageController extends Controller
{

    public function welcome(){

        $courses = DB::table('courses')->get();

        return view('front.main', compact('courses'));
    }

    public function about()
    {
        return view('front.simulatorBig');
    }

    public function simulator()
    {
        return view('front.simulator');
    }

    public function student_courses_main()
    {
        $courses = DB::table('courses')->get();
        return view('front.student_courses_main', compact('courses'));
    }

    public function student_courses()
    {
        return view('front.student_courses');
    }

    public function student_courses_ended()
    {
        return view('front.student_courses_ended');
    }

    public function student_profile()
    {
        $student_id = Auth::user()->id;
        $student_info = DB::table('users')->where('id', $student_id)->first();
        $student_full_info = DB::table('students')->where('user_id', $student_id)->first();
        $student_info->full_name = trim($student_info->surname . ' ' . $student_info->name . ' ' . $student_info->patronymic);
        return view('front.student_profile', compact('student_info', 'student_full_info'));
    }

    public function view_course($course_id, $tab = null) {
        $user = Auth::user();
        $course = DB::table('courses')->where('id', $course_id)->first();
        $course_information = DB::table('courses_information')->where('course_id', $course_id)->first();
        $course_lessons = DB::table('courses_program')->where('course_id', $course_id)->orderBy('id')->get();
        $course_faq = DB::table('courses_faq')->where('course_id', $course_id)->orderBy('id')->get();
        if (is_null($course)) {
            abort(404);
        }
        if ($course->assigned_teacher_id) {
            $course_teachers = DB::table('users')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            //->leftJoin('media', 'media.model_id' , '=', 'teachers.user_id')
            ->whereIn('users.id', json_decode($course->assigned_teacher_id))
            ->get();
        } else {
            $course_teachers = collect(null);
        }
        switch ($tab) {
        case 'teachers':
            return view('front.teachers', compact('course', 'course_information', 'course_teachers'));
            break;
        case 'program':
            return view('front.program', compact('course', 'course_information', 'course_lessons'));
            break;
        case 'faq':
            return view('front.questions', compact('course', 'course_information', 'course_faq'));
            break;
        default:
            return view('front.aboute_course', compact('course', 'course_information'));
            break;
        }
    }

    public function view_lesson($course_id, $lesson_id = null, $tab = null) {
        $user = Auth::user();

        $course = DB::table('courses')->where('id', $course_id)->first();
        $course_information = DB::table('courses_information')->where('course_id', $course_id)->first();

        if (is_null($course)) {
            abort(404);
        }
        if (isset($lesson_id)) {
            $lesson = DB::table('courses_program')->where([['course_id', '=', $course_id], ['id', '=', $lesson_id]])->first();
            $prevLesson = DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '<', $lesson->id]])->orderBy('id','desc')->first();
            $nextLesson = DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '>', $lesson->id]])->first();
            $lessonNumber = DB::table('courses_program')->where('course_id', '=', $course->id)->count() - DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '>', $lesson->id]])->count();
        } else {
            $lesson = DB::table('courses_program')->where('course_id', '=', $course_id)->orderBy('id','asc')->first();
        }

        if (is_null($lesson)) {
            abort(404);
        }

        if (is_null($user)) {
            $first_lesson_in_course = DB::table('courses_program')->where('course_id', '=', $course_id)->orderBy('id','asc')->first();
            if ($lesson->id > $first_lesson_in_course->id) {
               return view('front.guest');
            }
        }

        // Тесты
        $test_id = DB::table('courses_program')->where('id', $course->id)->first();
        $testInfo = DB::table('tests_info')->where('id', $test_id->id)->first();

            // Вопросы теста
            $testQuestions = DB::table('tests_questions')->where('test_id', $testInfo->id)->get();
            $testMultiplyIDS = [];
            $testTrueFalseIDS = [];
            $testDragDropIDS = [];
            foreach($testQuestions as $testQuest){
                if($testQuest->question_type == "Множинний вибір"){
                    //$testMultiplyOne = DB::table('tests_multiple_choice')->where('id', $testQuest->test_answers_id)->first();
                    array_push($testMultiplyIDS, $testQuest->test_answers_id);
                    //dd($testMultiply);
                } else { $testMultiplyOne = ""; }
                if($testQuest->question_type == "Правильно/неправильно"){
                    //$testTrueFalseOne = DB::table('tests_true_false')->where('id', $testQuest->test_answers_id)->get();
                    array_push($testTrueFalseIDS, $testQuest->test_answers_id);
                    //dd($testTrueFalse);
                } else { $testTrueFalseOne = ""; }
                if($testQuest->question_type == "Перетягування в тексті"){
                    //$testDragDropOne = DB::table('tests_drag_drop')->where('id', $testQuest->test_answers_id)->get();//
                    array_push($testDragDropIDS, $testQuest->test_answers_id);
                    //dd($testDragDrop);
                } else { $testDragDropOne = ""; }

            }
            $testMultiply = DB::table('tests_multiple_choice')->whereIn('id', $testMultiplyIDS)->get();
            $testTrueFalse = DB::table('tests_true_false')->whereIn('id', $testTrueFalseIDS)->get();
            $testDragDrop = DB::table('tests_drag_drop')->whereIn('id', $testDragDropIDS)->get();
            //dd($testMultiply);
            //dd($testQuestions);
        //dd($testInfo);

        switch ($tab) {
        case 'strings':
            return view('front.strings', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            break;
        case 'video':
            return view('front.video_collection', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            break;
        case 'model':
                return view('front.model', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
                break;
        case 'protocol':
            if ($lesson->show_protocol) {
                return view('front.protocol', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            }
            else {
                return redirect()->route('view_lesson', ['course_id' => $course_id, 'lesson_id' => $lesson_id]);
            }
            break;
        case 'test':
            return view('front.test', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson', 'testInfo', 'testDragDrop', 'testMultiply', 'testTrueFalse'));
            break;
        default:
            return view('front.strings', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));;
            break;
        }
    }

    public function guest()
    {
        return view('front.guest');
    }

    public function test_a()
    {
        return view('front.test_a');
    }

    public function test_b()
    {
        return view('front.test_b');
    }

    public function test_c()
    {
        return view('front.test_c');
    }
}
