<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsData extends Model
{
    protected $fillable = ['upload_date', 'status_from', 'ID_FO','recipient','birthday','gender','citizenship','specialty','reason_for_deduction'];
    protected $table = "Students_data";

    //protected $fillable = ['upload_date'];
}
