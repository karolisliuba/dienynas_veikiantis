@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Last name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Phone') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $items)
                <tr>
                    <th scope="row">{{ $items->id }}</th>
                    <td><a href="{{ route('student.show', $items->id) }}"> {{ $items->name }}</a></td>
                    <td>{{ $items->last_name }}</td>
                    <td>{{ $items->email }}</td>
                    @if ($items->phone == null)
                    <td>{{ __('#No number') }}</td>
                    @else
                    <td>{{ $items->phone }}</td>
                    @endif
                    <td>
                        <form action="{{ route('student.destroy', $items->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="X">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection