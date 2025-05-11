@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            {{ __('You are logged in!') }}
                        </div>

                        <p> {{ Auth::user()->name }}</p>
                        @if(Auth::user()->profile)
                            <div class="alert alert-dark">
                                <p> {{ Auth::user()->profile->address }}</p>
                            </div>
                        @endif
                        <div class="alert alert-info" role="alert">
                            @foreach($posts as $post)
                                <p>{{ $post->title }}</p>
                                <p>{{ $post->users->name }}</p>

                                @foreach($post->tag as $tag)
                                    <div class="alert alert-light">
                                        {{ $tag->name }}
                                    </div>
                                @endforeach

                                <hr>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
