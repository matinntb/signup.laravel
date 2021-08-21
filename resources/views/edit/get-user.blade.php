@extends('signup.signup-frame')

@section('title','ورود اطلاعات')
@push('script')
    <script type="text/javascript" src="/assets/js/js-signup.js"></script>
@endpush

@push('css')
    <link type="text/css" rel="stylesheet" href="/assets/css/css-signup.css">
@endpush

@section('content')
    <div class="ui doubling stackable two column centered grid"> <!--nesfe safhe ra migire -->
        <div class="row">
            <div class="ui nine wide computer column">
                <div class="ui raised segment" >
                    <div class="ui doubling stackable two column grid" id="form-image-div">
                        <div class="middle aligned column" id="center">
                            <img class="register-img" src="/assets/img/register.jpg">
                        </div>
                        <div class="column">
                            <form action="{{ url("/get_user") }}" method="post" class="ui form" id="signup-form" >
                                @csrf
                                @method('POST')
                                <h1 class="ui center aligned header">
                                    ورود اطلاعات
                                </h1>

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

                                <button class="fluid ui primary submit button" name="register" id="button" type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
