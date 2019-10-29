@extends('layouts.app')

@section('content')

    <a href="/categories">Categories</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            @if ($exercises)
                <div class="exercises">
                @foreach ($exercises as $exercise)
                    <a href="single-exercise/{{$exercise->id}}/" class="exercise">
                        <div class="exercise-container">
                            <h2 class="exercise-heading">{{$exercise->name}}</h2>
                            <h4 class="exercise-subheading">Arms, Back, Legs</h4>
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
        </div>
    </div>
</div>
@endsection
