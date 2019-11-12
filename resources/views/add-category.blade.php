@extends('layouts.app')

@section('content')
        <h2>Add New Category</h2>

        <form method="POST" action="/add-category">
            <div class="form-group">
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-liftlog">Add Category</button>
            </div>
            {{ csrf_field() }}
        </form>
@endsection
