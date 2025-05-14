
<form id="form" 
      action="{{ $finalRoute }}" 
      enctype="multipart/form-data" 
      method="post">
    @csrf

    @yield('album_section')

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
                url: '{{ $finalRoute }}',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#errorMessage').empty();
                    if (response['code'] === 1) {
                        $('.show').html(response['message']);
                        $("#form")[0].reset();
                    } 
                    
                    if (response['code'] === 2) {
                        location.reload();
                    }
                },
                error: function(data) {
                    console.log(data);
//                    console.log(data.responseJSON);
                    $('#errorMessage').empty();
//
                    let error = data.responseJSON;
                    $.each(error.errors, function(key, value) {
                        $("#errorMessage").append('<p class="alert alert-danger">' + value + '</p>');
                    });
                    $('.btn-close').click();
                }
            });
        });
    });
</script>