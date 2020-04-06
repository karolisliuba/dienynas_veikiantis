<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function grades()
    {
        return $this->hasMany('App\Grade', 'student_id', 'id');
    }

    // public function lecture() {
    //     return $this->hasMany('App\Lecture', 'id', 'last_name' );
    // }
}
