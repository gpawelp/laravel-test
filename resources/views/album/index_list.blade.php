@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Album') }}
                        <a href="{{ route('album.home') }}" 
                           class="btn btn-primary float-end">{{ __('Add images') }}</a>
                    </div>

                    <div class="card-body">
                        @foreach($images as $image)
                            <img src="{{ asset('storage/' . $image->name) }}" 
                                 alt="Some image"
                                 class="img-thumbnail"
                                 width="200"/>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
