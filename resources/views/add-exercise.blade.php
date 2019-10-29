@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Exercise</h2>

        <form method="POST" action="/add-exercise">
            <div class="form-group">
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Exercise</button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
@endsection
