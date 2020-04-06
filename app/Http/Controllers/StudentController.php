<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests\StudentRequest;
use App\Lecture;
use App\Grade;
use App\Http\Requests\GradeRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = new Student();

        $student->name = $request->input('name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');

        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $lecture = Lecture::all();

        $avg = Grade::where('student_id', '=', $id)->get();

        if ($avg->count() == null) {
            $avgComponent = 'No grades';
        } else {
            $avgComponent = $avg->sum('grade') / $avg->count();
        }

        return view('students.show', compact('student', 'lecture', 'avgComponent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->name = $request->input('name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');

        $student->update();

        return redirect()->route('student.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('student.index');
    }
}
