<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['course_id','name'];
    public function student(){
            return $this->belongsTo(Course::class);
    }
}
