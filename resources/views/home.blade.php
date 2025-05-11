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
                    @if (Auth::user()->profile)
                    <div class="alert alert-light">
                        <p> {{ Auth::user()->profile->address }}</p>
                            </div>
                    @endif
                    <div class="alert alert-info" role="alert">
                        @foreach($users as $user)
                            @foreach($user->posts as $post)
                                <p>{{ $post->title }}</p>
                            @endforeach
                            <p>{{$user->name}}</p>
                            <hr>
                        @endforeach
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
