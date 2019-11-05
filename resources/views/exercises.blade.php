@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            @if ($pageTitle == 'Dashboard')
                @if ($exercises)
                    <div class="exercises">
                    @foreach ($exercises as $exercise)
                        <a href="/single-exercise/{{$exercise->id}}/" class="exercise">
                            <div class="exercise-container">
                                <h2 class="exercise-heading">{{$exercise->name}}</h2>
                                <h4 class="exercise-subheading">
                                    {{-- Loop through categ --}}
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
                    <div class="add-exercise">
                        <a href="/add-exercise" class="btn btn-primary btn-liftlog">Add Exercise</a>
                    </div>
                @else
                    <div class="add-exercise">
                        <p>You have no exercises</p>
                        <a href="/add-exercise" class="btn btn-primary btn-liftlog">Add Exercise</a>
                    </div>
                @endif
            @else
                @if ($exercises)
                    <div class="exercises">
                        @foreach ($exercises as $exercise)
                            <a href="/single-exercise/{{ $exercise->id }}" class="exercise">
                                <div class="exercise-container">
                                    <h2 class="exercise-heading">{{ $exercise->name }}</h2>
                                    <h4 class="exercise-subheading">
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
                    <div class="add-exercise">
                        <a href="/add-exercise" class="btn btn-primary btn-liftlog">Add Exercise</a>
                    </div>
                @else
                    <div class="add-exercise">
                        <p>You have no exercises for this category.</p>
                        <a href="/add-exercise" class="btn btn-primary btn-liftlog">Add Exercise</a>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
