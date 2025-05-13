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

                    <div class="card-body">
                        <form action="{{ route('album.store') }}" 
                              enctype="multipart/form-data"
                              method="post">
                            @csrf
                            
                            <input type="text" name="album" class="form-control" placeholder="Your album name"><br>
                            
                            <input type="file" name="image[]" class="form-control"><br>
                            <input type="file" name="image[]" class="form-control"><br>
                            <input type="file" name="image[]" class="form-control">
                            <hr>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
