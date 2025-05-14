@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        
        <div id="errorMessage"></div>
        
        <div class="form-control">
            <button type="button" class="btn btn-primary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#addImageModal">{{ __('Dodaj zdjęcie') }}</button>
            
            <!-- Modal Add -->
            <div class="modal fade" id="addImageModal" 
                 tabindex="-1" aria-labelledby="addImageLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addImageLabel">{{ __('Dodaj') }}</h5>
                            <button type="button" class="btn-close" 
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('forms.add_images_with_hidden_album_id', [
                                'album_id' => $album_images->id,
                                'finalRoute' => route('album.addimage')
                            ])
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODEL Add -->
        </div>
        
        <div class="row justify-content-center">
            <h1>{{ $album_images->name }} ({{ $album_images->images->count() }})</h1>
            @foreach($album_images->images as $image)
                <div class="col-sm-4">
                    <div class="item">
                        <img src="{{ asset('storage/' . $image->name) }}" 
                     class="img-thumbnail">
                    </div>

                    <!--<div class="form-control">
                        <form action="{{ route('image.delete') }}" method="POST">
                                @csrf
                            <input type="hidden" name="id" value="{{ $image->id }}">
                            <button type="submit" class="btn btn-danger">{{ __('Usuń') }}</button>
                        </form>
                    </div>-->

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" 
                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $image->id }}">{{ __('Usuń') }}</button>

                    <!-- Modal REMOVE -->
                    <div class="modal fade" id="exampleModal{{ $image->id }}" 
                         tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Usuń') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ __('Czy chcesz na pewno usunąć zdjęcie?') }}
                                </div>
                                <div class="modal-footer">

                                    <form action="{{ route('image.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $image->id }}">
                                        <button type="submit" class="btn btn-danger">{{ __('Usuń') }}</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODEL REMOVE -->

                </div>
            @endforeach
        </div>
    </div>
@endsection