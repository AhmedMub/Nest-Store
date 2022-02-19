// border fix for Login page
$(function() {

    $('.validate-inputs').each(function () {

        if($(this).hasClass('is-invalid')) {

            $(this).prev().addClass('is-invalid-loginFix');
           }
    });

});


$(function() {

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_photo_path').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
});
