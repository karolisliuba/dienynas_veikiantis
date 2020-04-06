@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">

            <h3>
                Updating {{ $student->name }}, {{ $student->last_name }} history:
            </h3>
            <form action="{{ route('student.update', $student->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value='{{ old("name", $student->name) }}'>
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="last_name" class="form-control" value='{{ old("last_name", $student->last_name) }}'>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" value='{{ old("email", $student->email) }}'>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="phone" name="phone" class="form-control" value='{{ old("phone", $student->phone) }}'>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit changes">
            </form>
        </div>
    </div>
</div>
@endsection