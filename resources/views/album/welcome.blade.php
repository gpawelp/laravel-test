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
                            @if(empty($album->image))
                                <img src="{{ asset('images/lew.jpg') }}" class="img-thumbnail">
                            @else
                                <img src="{{ asset('storage/' .$album->image ) }}" class="img-thumbnail">
                            @endif
                            <a href="{{ url('/albums/' . $album->id) }}" 
                                class="centered">{{ $album->name }}</a>
                        </div>

                        <!-- Button trigger modal -->
                        @if(Auth::check() && Auth::user()->user_type === 'admin')
                        <button type="button" 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#exampleModal{{ $album->id }}">
                            {{ __('Add image') }}
                        </button>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" 
                             id="exampleModal{{ $album->id }}" 
                             tabindex="-1" 
                             aria-labelledby="exampleModalLabel" 
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Add image to album') }}</h5>
                                        <button type="button" class="btn-close" 
                                                data-bs-dismiss="modal" 
                                                aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('add.album.image') }}" 
                                          method="POST" 
                                          enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="modal-body">
                                            <input type="file" 
                                                   name="image" 
                                                   id="image" class="form-control" 
                                                   accept="image/png,image/jpeg">
                                            <input type="hidden"  
                                                   name="id" value="{{ $album->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" 
                                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                                            <button type="submit" 
                                                    class="btn btn-success">{{ __('Save changes') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection