@extends('layouts.app')

@section('content')

    @if ($exercises)
        <div class="liftlog-list">
        @foreach ($exercises as $exercise)
            <a href="/single-exercise/{{$exercise->id}}/" class="liftlog-list-item">
                <div class="liftlog-list-item-wrapper">
                    <h2 class="liftlog-list-heading">{{$exercise->name}}</h2>
                    <h4 class="liftlog-list-subheading">|
                        @foreach ($categories as $category)
                            @foreach ($exerciseCategories as $exerciseCategory)
                                @if ($exercise->id  == $exerciseCategory->exercise_id && $category->id == $exerciseCategory->exercise_category_id)
                                    {{ $category->name }} |
                                @endif
                            @endforeach
                        @endforeach
                    </h4>
                    <hr>
                </div>
            </a>
        @endforeach
        </div>
        <div class="liftlog-button-group">
            <a href="/add-exercise" class="btn btn-liftlog">Add Exercise</a>
        </div>
    @else
        <div class="text-center">
            <p>You have no exercises</p>
        </div>
        <div class="liftlog-button-group">
            <a href="/add-exercise" class="btn btn-liftlog">Add Exercise</a>
        </div>
    @endif

@endsection
