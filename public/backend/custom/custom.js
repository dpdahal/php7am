function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#target_image').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#change_image").change(function () {
    readURL(this);
});



$(document).ready(function () {

    //========remove alert class

    setTimeout(function () {
        $('.alert').hide('slow')

    }, 2000);

    $('#privilege_id').select2();

    $('#select_all').on('click', function () {
        if (this.checked) {
            $('.checkbox').each(function () {
                this.checked = true;
                $('#my_button').css('display', 'block');
            });
        } else {
            $('.checkbox').each(function () {
                this.checked = false;
                $('#my_button').css('display', 'none');
            });
        }
    });


    // instance ckeditor

    CKEDITOR.replace('description-text-area');
});