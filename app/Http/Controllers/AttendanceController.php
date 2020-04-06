<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Student;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    public function show($id) {

        $student = Student::findOrFail($id);
        // $attendance = Attendance::findOrFail($id);

        return view('attendance.show', compact('student'));
    }
}
