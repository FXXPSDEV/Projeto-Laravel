<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['name'];
    public function course(){
        return $this->hasMany(Student::class);
    }
}
