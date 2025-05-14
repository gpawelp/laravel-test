@extends('forms.add_images_main')

@section('album_section')
    <div class="form-group form-control">
        <label for="album_name">{{ __('Name of album') }}</label>
        <input id="album_name" type="text" name="album" class="form-control">
    </div>
@endsection