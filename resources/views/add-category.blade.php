@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="true"
        name="{{ Auth::user()->name }}"
        page_title="Add Category"
    ></header-component>

    <div class="container single-exercise">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

                <form method="POST" action="/add-category">
                    <div class="liftlog-form-group">
                        <label class="liftlog-label" for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="liftlog-input" required autocomplete="off" />
                    </div>
                    <div class="liftlog-button-group">
                        <button type="submit" class="btn btn-liftlog">Add Category</button>
                    </div>
                    {{ csrf_field() }}
                </form>

            </div>
        </div>
    </div>

@endsection
