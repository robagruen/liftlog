@extends('layouts.app')

@section('content')

        <form method="POST" action="/add-category">
            <div class="liftlog-form-group">
                <label class="liftlog-label" for="name">Category Name</label>
                <input type="text" name="name" id="name" class="liftlog-input" />
            </div>
            <div class="liftlog-button-group">
                <button type="submit" class="btn btn-liftlog">Add Category</button>
            </div>
            {{ csrf_field() }}
        </form>

@endsection
