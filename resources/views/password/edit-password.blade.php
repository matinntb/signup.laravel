@extends('layouts.app')

@section('title','ویرایش رمز عبور')
@push('script')
    <script type="text/javascript" src="/assets/js/js-edit-password.js"></script>
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

                            <form action="{{url("/password/$user->id")}}" method="post" class="ui form" id="signup-form">
                                @csrf
                                @method('POST')
                                <a  href="{{url("/user")}}" class="">
                                    <i class="arrow left violet icon"></i>

                                    </a>
                                    <h1 class="ui center aligned header">
                                        تغییر رمز عبور
                                    </h1>

                                <div class="required field">
                                    <label for="current_password"> رمز عبور فعلی</label>
                                    <div class="ui icon input">
                                        <input type="password" name="current_password" id="current_password" class="input" placeholder="رمز عبور">
                                        <i class="lock icon"></i>
                                    </div>
                                    @error('current_password')
                                    <div class="ui red message">{{$message}}</div>
                                    @enderror
                                </div>

                                    <div class="required field">
                                        <label for="new_password"> رمز عبور جدید</label>
                                        <div class="ui icon input">
                                            <input type="password" name="new_password" id="new_password" class="input" placeholder="رمز عبور">
                                            <i class="lock icon"></i>
                                        </div>
                                        @error('new_password')
                                        <div class="ui red message">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="required field">
                                        <label for="new_password_confirmation"> تکرار رمز عبور</label>
                                        <div class="ui icon input">
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="input" placeholder="تکرار رمز عبور">
                                            <i class="lock icon"></i>
                                        </div>
                                        @error('new_password_confirmation')
                                    <div class="ui red message">{{$message}}</div>
                                    @enderror
                                    </div>


                                <button class="fluid ui primary submit button" name="register" id="button" type="submit">ثبت</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
