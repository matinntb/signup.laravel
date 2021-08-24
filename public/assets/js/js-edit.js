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

