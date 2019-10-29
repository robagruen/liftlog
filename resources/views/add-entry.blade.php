@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Add New Entry</h2>

        <form method="POST" action="/add-entry">
            <add-entry-form exercise_id="{{ $exercise }}"></add-entry-form>
            {{ csrf_field() }}
        </form>
    </div>
    
@endsection
