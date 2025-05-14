@extends('forms.add_images_main')

@section('album_section')
    <input id="album_id" type="hidden" name="album" class="form-control" value="{{ $album_id }}">
@endsection