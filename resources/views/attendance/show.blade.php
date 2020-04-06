@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="#" method="post"></form>
        </div>
        <div class="col-12">
            <h4>
                {{ __('Month') }}
            </h4>
            <table>
                <thead>
                    <tr id="month1">
                        <th scope="col">{{ $student->name }}, {{ $student->last_name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="month">
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection