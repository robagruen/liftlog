@extends('layouts.app')

@section('content')

    <h2>Add New Entry for {{ $exercise_name[0]->name }}</h2>

    <form method="POST" action="/add-entry">
        <add-entry-form exercise_id="{{ $exercise }}"></add-entry-form>
        {{ csrf_field() }}
    </form>

@endsection
