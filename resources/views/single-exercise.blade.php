@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="true"
        name="{{ Auth::user()->name }}"
        page_title="{{ $exercise->name }}"
    ></header-component>

    <div class="container single-exercise">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

                @if ($entries)
                    <div class="single-exercise-top-entry">
                        <h1 class="single-exercise-top-entry-weight">{{ $top_entry_info['weight'] }}</h1>
                        <p class="single-exercise-top-entry-time">lbs. on {{ $top_entry_info['time'] }}</p>
                    </div>
                    <div class="single-exercise-container">
                        @foreach ($entries as $entry)
                            <div class="entry">
                                <div class="entry-time">
                                    @if ($entry->entry_date)
                                        <strong>{{ date('F d, Y', strtotime($entry->entry_date)) }}</strong>
                                    @else
                                        <strong>{{ date('F d, Y', strtotime($entry->updated_at)) }}</strong>
                                    @endif
                                    <div class="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="vertical-menu dropdown-toggle" data-toggle="dropdown">
                                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                        </svg>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <form action="/single-exercise/{{ $exercise->id }}/entry/{{ $entry->id }}/">
                                                <button class="dropdown-item" formmethod="POST">Delete</button>
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($sets as $set)
                                    @if ($set->exercise_entry_id == $entry->id)
                                        <p class="entry-info">{{$set->weight}} llbs. x {{$set->repetitions}}</p>
                                    @endif
                                @endforeach
                                <hr>
                            </div>
                        @endforeach
                    </div>

                @else
                    <div class="text-center">
                        <p>You have no entries</p>
                    </div>
                @endif
                <div class="liftlog-button-group">
                    <a class="btn btn-liftlog" href="/single-exercise/{{ $exercise->id }}/add-entry">Add entry</a>
                </div>

                <canvas id="myChart" width="400" height="400"></canvas>

            </div>
        </div>
    </div>

@endsection
