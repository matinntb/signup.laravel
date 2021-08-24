@extends('layout')

@section('title','ویرایش اطلاعات')
@push('script')
    <script type="text/javascript" src="/assets/js/js-edit.js"></script>
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

                                <form action="{{url("/user/ $user->id" )}}" method="post" class="ui form" id="signup-form" >
                                @csrf
                                @method('PUT')
                                    <a href="{{url("/user")}}" class="">
                                        <i class="arrow left violet icon"></i>

                                    </a>
                                <h1 class="ui center aligned header">
                                    ویرایش
                                </h1>

                                <div class=" required field">
                                    <label for="first_name">نام</label>
                                    <div class="ui icon input">
                                        <input type="text" name="first_name" id="first_name" class="input" placeholder="نام" value="{{ old('first_name') ?? $user->first_name}}">
                                        <i class="user icon"></i>
                                    </div>
                                    @error('first_name')
                                    <div class="ui red message">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="required field">
                                    <label for="last_name">نام خانوادگی</label>
                                    <div class="ui icon input">
                                        <input type="text" name="last_name" id="last_name" class="input" placeholder="نام خانوادگی" value="{{ old('last_name') ?? $user->last_name}}">
                                        <i class="user icon"></i>
                                    </div>
                                    @error('last_name')
                                    <div class="ui red message">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="required field">
                                    <label for="email">پست الکترونیکی</label>
                                    <div class="ui icon input">
                                        <input name="email" id="email" class="input" placeholder="پست الکترونیکی" value="{{ old('email') ?? $user->email}}">
                                        <i class="envelope icon"></i>
                                    </div>
                                    @error('email')
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
