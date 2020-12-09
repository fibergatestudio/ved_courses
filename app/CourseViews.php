<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseViews extends Model
{
    protected $table = 'course_views';

    public static function createViewLog($course) {
            $postsViews= new CourseViews();
            $postsViews->course_id = $course->id;
            $postsViews->course_name = $course->name;
            $postsViews->url = \Request::url();
            $postsViews->session_id = \Request::getSession()->getId();
            $postsViews->user_id = \Auth::user()->id;
            $postsViews->ip = \Request::getClientIp();
            $postsViews->agent = \Request::header('User-Agent');
            $postsViews->save();
    }
}
