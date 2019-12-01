@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="true"
        name="{{ Auth::user()->name }}"
        page_title="Add Calories Entry"
    ></header-component>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

                <add-entry-form></add-entry-form>

            </div>
        </div>
    </div>

@endsection
