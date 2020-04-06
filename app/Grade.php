<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    // public function grade() {
    //     return $this->hasOne('App\Student', 'id', 'student_id');
    // }

    public function lectures() {
        return $this->hasOne('App\Lecture', 'id', 'lectures_id');
    }
}
