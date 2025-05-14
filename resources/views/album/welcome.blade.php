@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        
        <div class="row">
            <h1>{{ __('Albumy') }}</h1>
            @foreach($albums as $album)
                <div class="col-sm-4">
                    <a href="{{ url('/albums/' . $album->id) }}">
                        <div class="item">
                            <img src="{{ asset('images/lew.jpg') }}" class="img-thumbnail">
                            <a href="{{ url('/albums/' . $album->id) }}" 
                               class="centered">{{ $album->name }}</a>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection