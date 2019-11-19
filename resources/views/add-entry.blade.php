@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="true"
        name="{{ Auth::user()->name }}"
        page_title="Exercises"
    ></header-component>

    <div class="container single-exercise">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

                <add-entry-form exercise_id="{{ $exercise }}"></add-entry-form>

            </div>
        </div>
    </div>

@endsection
