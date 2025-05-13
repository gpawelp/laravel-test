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
                        <div class="input-group control-group initial-add-more">
                            <input type="file" name="image[]" class="form-control" id="image">
                            <div class="input-group-btn">
                                <button class="btn btn-success btn-add-more" type="button">{{ __('Add') }}</button>
                            </div> 
                        </div>

                        <div class="copy" style="display: none;">
                            <div class="control-group">
                                <hr>
                                <div class="input-group add-more">
                                    <input type="file" name="image[]" class="form-control" id="image">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger remove" type="button">{{ __('Remove') }}</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
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
    });
    </script>
@endsection

