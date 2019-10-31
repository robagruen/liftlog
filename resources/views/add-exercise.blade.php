@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Exercise</h2>

        <form method="POST" action="/add-exercise">
            <div class="form-group">
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
                @foreach ($categories as $i => $category)
                    <label for="category_{{ $category->id }}">
                        <input type="checkbox" name="category_{{ $i }}" class="category_checkboxes" id="category_{{ $category->id }}" value="{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                @endforeach
                <input type="hidden" name="category_count" id="category_count" value="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-liftlog">Add Exercise</button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
@endsection
