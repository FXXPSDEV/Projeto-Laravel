<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['course_id','name'];
    public function student(){
            return $this->belongsTo(Courses::class);
    }
}
