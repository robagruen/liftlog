@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="true"
        name="{{ Auth::user()->name }}"
        page_title="Categories"
    ></header-component>

    <div class="container single-exercise">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

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
                @else
                    <div class="text-center">
                        <p>You have no categories</p>
                    </div>
                @endif
                <div class="liftlog-button-group">
                    <a href="/add-category" class="btn btn-liftlog">Add Category</a>
                </div>

            </div>
        </div>
    </div>

@endsection
