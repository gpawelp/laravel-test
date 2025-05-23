@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div id="errorMessage"></div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" class="form-control">
                        <button type="submit" class="btn btn-success">{{ __('Upload') }}</button>
                    </form>
                </div>
            </div>
            
            @foreach($albums as $album)
                <img src="{{ asset('avatars') }}/{{ $album->image }}">
            @endforeach
            
        </div>
    </div>
@endsection