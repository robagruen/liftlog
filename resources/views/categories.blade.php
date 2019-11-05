@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            @if ($categories)
                <div class="exercises">
                @foreach ($categories as $i => $category)
                    <a href="single-category/{{ $category->id }}/" class="liftlog-list">
                        <div class="liftlog-list-wrapper">
                            <h2 class="liftlog-list-heading">{{ $category->name }}</h2>
                            @if ($count)
                            <h4 class="liftlog-list-subheading">{{ $count[$i] }} Items</h4>
                            @endif
                            <hr>
                        </div>
                    </a>
                @endforeach
                </div>
                <div class="add-category">
                    <a href="/add-category" class="btn btn-primary btn-liftlog">Add Category</a>
                </div>
            @else
                <div class="add-category">
                    <p>You have no categories</p>
                    <a href="/add-category" class="btn btn-primary btn-liftlog">Add Category</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
