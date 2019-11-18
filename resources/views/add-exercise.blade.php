@extends('layouts.app')

@section('content')

    <form method="POST" action="/add-exercise">
        <div class="liftlog-form-group">
            <label for="name" class="liftlog-label">Exercise Name</label>
            <input type="text" name="name" id="name" class="liftlog-input" />
        </div>
        <div class="liftlog-form-group">
            <label class="liftlog-label">Exercise Categories</label>
            @if ($categories)
                @foreach ($categories as $i => $category)
                    <label for="category_{{ $category->id }}">
                        <input type="checkbox" name="category_{{ $i }}" class="category_checkboxes" id="category_{{ $category->id }}" value="{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                @endforeach
            @else
                You seem to have no categories.  <a href="/categories/">Add Category</a>
            @endif
            <input type="hidden" name="category_count" id="category_count" value="">
        </div>
        <div class="liftlog-button-group">
            <button type="submit" class="btn btn-liftlog">Add Exercise</button>
        </div>
        {{ csrf_field() }}
    </form>

@endsection
