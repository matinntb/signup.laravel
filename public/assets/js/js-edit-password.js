$(document).ready(function () {

    // front-end validation using semantic form-validation

    $('.ui.form').form({
      on: 'blur',
      inline:true,
        fields: {
        current_password: {
          identifier  : 'current_password',
          rules: [
            {
              type    : 'empty',
              prompt  : 'لطفا رمز عبور فعلی را وارد کنید'
            },
            {
              type    : 'minLength[5]',
              prompt  : 'رمز عبور نباید کمتر از 5 کاراکتر باشد'
            },
            {
              type    : 'maxLength[30]',
              prompt  : 'رمز عبور نباید بیشتر از 30 باشد'
            },
            {
              type   : 'regExp[/^([A-Za-z]+)([0-9]+)(([A-Za-z0-9!@#$%&*?])*){5,30}$/]',
              prompt : 'رمز عبور یک فرمت معتبر نیست'
            }
          ]
        },
        new_password: {
          identifier  : 'new_password',
          rules: [
            {
              type    : 'empty',
              prompt  : 'لطفا رمز عبور را وارد کنید'
            },
            {
              type    : 'minLength[5]',
              prompt  : 'رمز عبور نباید کمتر از 5 کاراکتر باشد'
            },
            {
              type    : 'maxLength[30]',
              prompt  : 'رمز عبور نباید بیشتر از 30 باشد'
            },
            {
              type   : 'regExp[/^([A-Za-z]+)([0-9]+)(([A-Za-z0-9!@#$%&*?])*){5,30}$/]',
              prompt : 'رمز عبور یک فرمت معتبر نیست'
            }
          ]
        },
        new_password_confirmation: {
          identifier  : 'new_password_confirmation',
          rules: [
            {
              type   : 'match[new_password]',
              prompt : 'رمزها مطابقت ندارند'
            }
          ]
        }
    }

    });

    $('#button').click(function(){

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

