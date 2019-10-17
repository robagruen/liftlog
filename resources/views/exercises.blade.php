@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
                @if ($exercises)
                    <ul>
                    @foreach ($exercises as $exercise)
                        <li>This guy has an exercise <a href="single-exercise/{{$exercise->id}}">{{$exercise->name}}</a></li>
                    @endforeach
                    </ul>
                @else
                    <p>You have no exercises</p>
                @endif
            <a href="/add-exercise">Add Exercise</a>
        </div>
    </div>
</div>
@endsection
