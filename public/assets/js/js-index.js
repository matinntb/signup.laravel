$(document).ready(function () {

    $('#regButton').click(function(){

        $(this).transition('pulse');

    });
    if (alert_msg){

        Swal.fire({

            icon: alert_type,

            title: alert_msg,

            confirmButtonText: "اوکی"

        })
    }

});

