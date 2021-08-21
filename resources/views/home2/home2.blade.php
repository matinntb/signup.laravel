@extends('home.home-frame')

@section('title','صفحه اصلی')

@push('script')
    <script type="text/javascript" src="/assets/js/js-home2.js"></script>
@endpush

@push('css')
    <link type="text/css" rel="stylesheet" href="/assets/css/css-home.css">

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
                        <div class="middle aligned column">
                            <div class="ui doubling stackable centered grid">
                                <div class="row">
                                    <div class="buttons">
                                        <a id="button" href="user/create" class="fluid ui middle aligned button">عضویت مجدد</a>
                                        <a id="button" href="get_user" class="fluid ui button">ویرایش اطلاعات</a>
                                    </div>
                                </div>
                            </div>
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
