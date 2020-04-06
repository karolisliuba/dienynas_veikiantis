@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input  type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="phone" name="phone" class="form-control">
                </div>
                <input type="submit" class="btn btn-warning" value="Add student">
            </form>
        </div>
    </div>
</div>
@endsection