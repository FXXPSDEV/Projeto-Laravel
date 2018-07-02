<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['name', 'ement', 'max_students'];
    public function course(){
        return $this->hasMany(Students::class);
    }
}
