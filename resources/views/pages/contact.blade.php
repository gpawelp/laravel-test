@extends('layouts.master')

@section('content')

This is contact page!
    <br>
    <a href="{{ route('contact.view') }}">Click me!</a><br>
    <a href="{{ action([App\Http\Controllers\ContactController::class, 'index']) }}">Click me again!</a><br>
    
    <div>
        <img src="{{ asset('bird.jpg') }}">
    </div>

@endsection