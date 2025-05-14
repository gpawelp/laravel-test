@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Album') }}
                        <a href="{{ route('album.index') }}" 
                            class="btn btn-primary float-end">{{ __('List') }}</a>
                    </div>

                    <div class="show"></div>
                    
                    <div id="errorMessage"></div>
                    
                    <div class="card-body">
                        @include('forms.add_images', ['finalRoute' => route('album.store')])
                    </div>

                </div>
            </div>
        </div>
    </div>

    
@endsection

