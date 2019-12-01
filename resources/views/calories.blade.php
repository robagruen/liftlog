@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="true"
        name="{{ Auth::user()->name }}"
        page_title="Calories"
    ></header-component>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

{{--                @if ($calories)--}}
{{--                    <div class="liftlog-list">--}}
{{--                    @foreach ($calories as $i => $calorie)--}}
{{--                        <a href="/categories/single-category/{{ $calorie->id }}/" class="liftlog-list-item">--}}
{{--                            <div class="liftlog-list-item-wrapper">--}}
{{--                                <h2 class="liftlog-list-heading">{{ $calorie->name }}</h2>--}}
{{--                                @if ($count)--}}
{{--                                <h4 class="liftlog-list-subheading">{{ $count[$i] }} Items</h4>--}}
{{--                                @endif--}}
{{--                                <hr>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="text-center">--}}
{{--                        <p>You have no calories entries</p>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="liftlog-button-group">
                    <a href="/add-calories-entry/" class="btn btn-liftlog">Add Calories Entry</a>
                </div>

            </div>
        </div>
    </div>

@endsection
