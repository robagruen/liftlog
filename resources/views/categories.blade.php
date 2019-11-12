@extends('layouts.app')

@section('content')

    @if ($categories)
        <div class="liftlog-list">
        @foreach ($categories as $i => $category)
            <a href="/categories/single-category/{{ $category->id }}/" class="liftlog-list-item">
                <div class="liftlog-list-item-wrapper">
                    <h2 class="liftlog-list-heading">{{ $category->name }}</h2>
                    @if ($count)
                    <h4 class="liftlog-list-subheading">{{ $count[$i] }} Items</h4>
                    @endif
                    <hr>
                </div>
            </a>
        @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="/add-category" class="btn btn-liftlog">Add Category</a>
        </div>
    @else
        <div class="text-center">
            <p>You have no categories</p>
            <a href="/add-category" class="btn btn-liftlog">Add Category</a>
        </div>
    @endif

@endsection
