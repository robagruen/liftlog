@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            {{$exercise->name}}
            @if ($entries)
                <ul>
                    @foreach ($entries as $entry)
                        <li>This guy has an entry {{$entry->id}}</li>
                    @endforeach
                </ul>
            @else
                <p>You have no entries</p>
            @endif
        </div>
    </div>
</div>
@endsection
