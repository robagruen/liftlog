@extends('layouts.app')

@section('content')

    <h1 class="mb-5">Settings</h1>
    @if ($exercises)
        <h2 class="mb-3">Exercises</h2>
        <div class="liftlog-list">
        @foreach ($exercises as $exercise)
            <a href="/single-exercise/{{$exercise->id}}/" class="liftlog-list-item">
                <div class="liftlog-list-item-wrapper">
                    <h2 class="liftlog-list-heading">{{$exercise->name}}</h2>
                    <div class="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="vertical-menu dropdown-toggle" data-toggle="dropdown">
                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <form action="/settings/delete-exercise/{{ $exercise->id }}/">
                                <button class="dropdown-item" formmethod="POST">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
            </a>
        @endforeach
        </div>
    @else
        <div class="add-exercise">
            <p>You have no exercises</p>
            <a href="/add-exercise" class="btn btn-primary btn-liftlog">Add Exercise</a>
        </div>
    @endif

    @if ($categories)
        <h2 class="mb-3 mt-5">Categories</h2>
        <div class="liftlog-list">
            @foreach ($categories as $i => $category)
                <a href="/categories/single-category/{{ $category->id }}/" class="liftlog-list-item">
                    <div class="liftlog-list-item-wrapper">
                        <h2 class="liftlog-list-heading">{{ $category->name }}</h2>
                        <div class="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="vertical-menu dropdown-toggle" data-toggle="dropdown">
                                <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                            </svg>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <form action="/settings/delete-category/{{ $category->id }}/">
                                    <button class="dropdown-item" formmethod="POST">Delete</button>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-center mt-5">
            <p>You have no categories</p>
            <a href="/add-category" class="btn btn-liftlog">Add Category</a>
        </div>
    @endif

@endsection
