@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @for($i = 0; $i < 10; $i++)
                            {{ $i }}
                        @endfor


                        @forelse($users as $user)
                            {{ $user }}<br>
                        @empty
                            <div class="alert alert-danger">
                                <h1>No users found</h1>
                            </div>
                        @endforelse

                        <hr>
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
