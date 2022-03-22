// border fix for Login page
$(function() {

    $('.validate-inputs').each(function () {

        if($(this).hasClass('is-invalid')) {

            $(this).prev().addClass('is-invalid-loginFix');
           }
    });

});

//category icon only checked one is allowed
$(function() {

$('.check-one').on('click',function() {
    $('.check-one').not(this).prop('checked', false);
    });

});



