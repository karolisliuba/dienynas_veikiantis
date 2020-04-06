@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <h3>
                {{ $student->name }}, {{ $student->last_name }}
            </h3>
            <div>
                <h5>
                    Update story:
                </h5>
                <table style="width: 100%">
                    <tr>
                        <th>#date</th>
                        <th>#lecture</th>
                    </tr>
                    @foreach ( $student->grades as $items )
                    <tr>
                        <td>
                            {{ $items->updated_at }}
                        </td>
                        <td>
                            {{ $items->grade }}, {{ $items->lectures->name }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-6">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $student->name }}, {{ $student->last_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $student->phone }}</h6>
                    <p class="card-text">{{ $student->email }}</p>
                    @if($avgComponent == null)
                    <p>{{ __('This student dont have grades') }}</p>
                    @else
                    <p class="card-text">{{ $avgComponent }}</p>
                    @endif
                    @guest
                    @else
                    <div>
                        <a href="{{ route('student.edit', $student->id) }}" class="card-link">{{ __('Update student') }}</a>
                    </div>
                    @endguest
                    <hr>
                    <div>
                        <a href="{{ route('attendance.show', $student->id) }}" class="card-link">{{ __('Student attendance') }}</a>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        @guest

        @else
        <div class="col-7">
            <h3>
                Add grade
            </h3>
            <form action="{{ route('grades.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">{{ __('Student') }}</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $student->name }}, {{$student->last_name}}">
                    </div>
                    <input type="hidden" value="{{ $student->id }}" name="student_id">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">{{ __('Grade') }}</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="grade">
                    </div>
                </div>
                <div class="form-group row">
                    <label>{{ __('Choose lecture') }}</label>
                    <select name="lecture_id" id="lecture_id" class="form-control">
                        @foreach($lecture as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="submit" value="{{ __('Add grade') }}" class="btn btn-primary">
                </div>
            </form>
        </div>
        @endguest

    </div>
</div>
@endsection