<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollments extends Model
{
    protected $fillable = ['course_id', 'student_id', 'authorized'];
}
