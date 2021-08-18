@extends('frame')

@section('title','صفحه ثبت نام')
@push('script')
    <script type="text/javascript" src="assets/js/js-signup.js"></script>
@endpush

@push('css')
    <link type="text/css" rel="stylesheet" href="assets/css/css-signup.css">
@endpush

@section('content')
    <div class="ui doubling stackable two column centered grid"> <!--nesfe safhe ra migire -->
        <div class="row">
        <div class="ui nine wide computer column">
            <div class="ui raised segment" >
                <div class="ui doubling stackable two column grid" id="form-image-div">
                    <div class="middle aligned column" id="center">
                        <img class="register-img" src="assets/img/register.jpg">
                    </div>
                    <div class="column">
                        <form action="" method="post" class="ui form" id="signup-form" >
                            @csrf
                            @method('POST')
                            <h1 class="ui center aligned header">
                                عضویت
                            </h1>

                            <div class=" required field">
                                <label for="first_name">نام</label>
                                <div class="ui icon input">
                                    <input type="text" name="first_name" id="first_name" class="input" placeholder="نام" value="{{old('first_name')}}">
                                    <i class="user icon"></i>
                                </div>
                                @error('first_name')
                                    <div class="ui red message">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="required field">
                                <label for="last_name">نام خانوادگی</label>
                                <div class="ui icon input">
                                    <input type="text" name="last_name" id="last_name" class="input" placeholder="نام خانوادگی" value="{{old('last_name')}}">
                                    <i class="user icon"></i>
                                </div>
                                @error('last_name')
                                <div class="ui red message">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="required field">
                                <label for="email">ایمیل</label>
                                <div class="ui icon input">
                                    <input name="email" id="email" class="input" placeholder="ایمیل" value="{{old('email')}}">
                                    <i class="envelope icon"></i>
                                </div>
                                @error('email')
                                <div class="ui red message">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="required field">
                                <label for="password">رمز عبور</label>
                                <div class="ui icon input">
                                    <input type="password" name="password" id="password" class="input" placeholder="رمز عبور">
                                    <i class="lock icon"></i>
                                </div>
                                @error('password')
                                <div class="ui red message">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="required field">
                                <label for="password_confirmation"> تکرار رمز عبور</label>
                                <div class="ui icon input">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="تکرار رمز عبور">
                                    <i class="lock icon"></i>
                                </div>
                                @error('password_confirmation')
                                <div class="ui red message">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="required field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="checkbox" id="checkbox" class="checkbox">
                                    <label>
                                        <a>شرایط و قوانین</a> را می پذیرم
                                    </label>
                                </div>
                                @error('checkbox')
                                <div class="ui red message">{{$message}}</div>
                                @enderror
                            </div>
                            <button class="fluid ui primary submit button" name="register" id="button" type="submit">عضویت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        var message_js;
        @if(Session::has('alert-success'))
            message_js = "{{ Session::get('alert-success') }}";
        @endif
    </script>
@endsection
