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
                        <form id="form" 
                          action="{{ route('album.store') }}" 
                          enctype="multipart/form-data" 
                          method="post">
                            @csrf

                            <div class="form-group form-control">
                                <label for="album_name">{{ __('Name of album') }}</label>
                                <input id="album_name" type="text" name="album" class="form-control">
                            </div>

                            <div class="form-control input-group control-group initial-add-more">
                                <input type="file" name="image[]" class="form-control" id="image">
                                <div class="input-group-btn">
                                    <button class="btn btn-success btn-add-more" type="button">{{ __('Add') }}</button>
                                </div> 
                            </div>

                            <div class="copy" style="display: none;">
                                <div class="form-control control-group">
                                    <hr>
                                    <div class="input-group add-more">
                                        <input type="file" name="image[]" class="form-control" id="image">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger remove" type="button">{{ __('Remove') }}</button>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="form-control">
                                <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-add-more').click(function() {
                let html = $(".copy").html();
                $(".initial-add-more").after(html);
            });

            $('body').on('click', '.remove', function() {
                $(this).parents(".control-group").remove();
            });
            
            $("#form").on('submit', function(e) {
                e.preventDefault();
                
                // Validation in jQuery
//
//                let album = $('#album').val();
//                if (album == "") {
//                    alert("Error");
//                    return false;
//                }

                $.ajax({
                    url: '/album',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('.show').html(response);
                        $("#form")[0].reset();
                        $('#errorMessage').empty();
                    },
                    error: function(data) {
//                        console.log(data.responseJSON);
                        $('#errorMessage').empty();

                        let error = data.responseJSON;
                        $.each(error.errors, function(key, value) {
                            $("#errorMessage").append('<p class="alert alert-danger">' + value + '</p>');
                        });
                    }
                });
            });
        });
    </script>
@endsection

