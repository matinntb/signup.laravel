$(document).ready(function () {

  // front-end validation using semantic form-validation

  $('.ui.form').form({
    on: 'blur',
    inline:true,
      fields: {
      first_name: {
        identifier  : 'first_name',
        rules: [
          {
            type    : 'empty',
            prompt  : 'لطفا نام را وارد کنید'
          },
          {
            type   : 'minLength[2]',
            prompt : 'نام نباید کمتر از 2 کاراکتر باشد'
          },
          {
            type   : 'maxLength[30]',
            prompt : 'نام نباید بیشتر از 30 کاراکتر باشد'
          },
          // {
          //   type   : 'regExp[/^[a-zA-Z ]*$/]',
          //   prompt : 'نام باید شامل حروف و فاصله باشد'
          // }
        ]
      },
      last_name: {
        identifier  : 'last_name',
        rules: [
          {
            type    : 'empty',
            prompt  : 'لطفا نام خانوادگی را وارد کنید'
          },
          {
            type   : 'minLength[2]',
            prompt : 'نام خانوادگی نباید کمتر از 2 کاراکتر باشد',
          },
          {
            type   : 'maxLength[30]',
            prompt : 'نام خانوادگی نباید بیشتر از 30 کاراکتر باشد'
          },
            // {
            //     type   : 'regExp[/^[\u0600-\u06FF ]*$/]',
            //     prompt : 'نام خانوادگی باید شامل حروف و فاصله باشد'
            // }
        ]
      },
      email: {
        identifier  : 'email',
        rules: [
          {
            type    : 'empty',
            prompt  : 'لطفا ایمیل را وارد کنید'
          },
          {
            type   : 'email',
            prompt :'ایمیل یک فرمت معتبر نیست'
          },
    {
              type    : 'maxLength[100]',
              prompt  : 'پست الکترونیکی نباید بیشتر از 100 کاراکتر باشد'
                },
        ]
      },
      password: {
        identifier  : 'password',
        rules: [
          {
            type    : 'empty',
            prompt  : 'لطفا رمز عبور را وارد کنید'
          },
          {
            type    : 'minLength[5]',
            prompt  : 'رمز عبور باید کمتر از 5 کاراکتر باشد'
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
      password_confirmation: {
        identifier  : 'password_confirmation',
        rules: [
          {
            type   : 'match[password]',
            prompt : 'رمزها مطابقت ندارند'
          }
        ]
      },
      checkbox:{
        identifier  : 'checkbox',
        rules:[
          {
            type: 'checked',
            prompt:'باید شرایط و قوانین را قبول کنید'
          }
        ]
      }
  }

  });

    $('#button').click(function(){

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

