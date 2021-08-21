$(document).ready(function () {

    $('a').click(function(){

        $(this).transition('pulse');

    });

    if (message_js != undefined && message_js == "Success"){

        Swal.fire({

            icon: 'success',

            title: 'عملیات با موفقیت انجام شد',

            confirmButtonText: "اوکی"

        })
    }

});

