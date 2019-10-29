@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            {{$exercise->name}}
            @if ($entries)
                {{ $highest_weight }}
                <div>
                    @foreach ($entries as $entry)
                        <p>{{ $entry->created_at }}</p>
                        @foreach ($sets as $set)
                            @if ($set->exercise_entry_id == $entry->id)
                                <p>{{$set->weight}} llbs. x {{$set->repetitions}}</p>
                            @endif
                        @endforeach
                        <hr>
                    @endforeach
                </div>
            @else
                <p>You have no entries</p>
            @endif
            <a href="add-entry">Add an entry</a>
        </div>
    </div>
</div>
@endsection
