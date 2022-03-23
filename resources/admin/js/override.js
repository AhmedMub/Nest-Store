// border fix for Login page
$(function() {

    $('.validate-inputs').each(function () {

        if($(this).hasClass('is-invalid')) {

            $(this).prev().addClass('is-invalid-loginFix');
           }
    });

});




