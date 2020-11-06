<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomePageController extends Controller
{

    public function welcome(){

        $courses = DB::table('courses')->get();

        return view('front.main', compact('courses'));
    }

    public function simulator()
    {
        return view('front.simulator');
    }

    public function welcome_page()
    {
        return view('front.welcome');
    }

    public function welcome2_page()
    {
        return view('front.welcome2');
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
        if (is_null($course)) {
            abort(404);
        }
        switch ($tab) {
        case 'teachers':
            return view('front.teachers', compact('course', 'course_information'));
            break;
        case 'program':
            return view('front.program', compact('course', 'course_information', 'course_lessons'));
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
        if (isset($lesson_id)) {
            $lesson = DB::table('courses_program')->where([['course_id', '=', $course_id], ['id', '=', $lesson_id]])->first();
            $prevLesson = DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '<', $lesson->id]])->orderBy('id','desc')->first();
            $nextLesson = DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '>', $lesson->id]])->first();
            $lessonNumber = DB::table('courses_program')->where('course_id', '=', $course->id)->count() - DB::table('courses_program')->where([['course_id', '=', $course->id], ['id', '>', $lesson->id]])->count();
        } else {
            $lesson = DB::table('courses_program')->where('course_id', '=', $course_id)->first();
        }
        /*if (is_null($course) or is_null($lesson)) {
            abort(404);
        }*/
        switch ($tab) {
        case 'video':
            return view('front.video_collection', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            break;
        case 'protocol':
            return view('front.protocol', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            break;
        case 'test':
            return view('front.test_a', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            break;
        case 'strings':
            return view('front.strings', compact('course', 'lesson', 'lessonNumber', 'prevLesson', 'nextLesson'));
            break;
        case 'teachers':
            return view('front.teachers', compact('course', 'course_information'));
            break;
        default:
            return view('front.aboute_course', compact('course', 'course_information'));
            break;
        }
    }

    public function guest()
    {
        return view('front.guest');
    }

    public function aboute_course()
    {
        return view('front.aboute_course');
    }

    public function student_settings()
    {
        return view('front.student_settings');
    }

    public function program()
    {
        return view('front.program');
    }

    public function protocol()
    {
        return view('front.protocol');
    }

    public function questions()
    {
        return view('front.questions');
    }

    public function strings()
    {
        return view('front.strings');
    }

    public function teachers()
    {
        return view('front.teachers');
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

    public function video_collection()
    {
        return view('front.video_collection');
    }
}
