@extends('layout')

@section('title','فهرست کاربران')
@push('script')
    <script type="text/javascript" src="/assets/js/js-index.js"></script>
@endpush

@push('css')
    <link type="text/css" rel="stylesheet" href="/assets/css/index.css">
@endpush

@section('content')
    <div class="ui doubling stackable two column centered grid"> <!--nesfe safhe ra migire -->
        <div class="row">
            <div class="ui nine wide computer column">
                <div class="ui raised segment" id="segment" >

                        <div>
                            <h2 class="ui header">فهرست کاربران</h2>
                        </div>
                        <button class="ui green button" id="regButton">
                            <a id="regUrl" href="{{url("/user/create")}}">
                                <i class="user icon"></i>
                                عضویت
                            </a>
                        </button>

                        <table class="ui selectable doubling unstackable table">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>پست الکترونیکی</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$user->first_name}}
                                    </td>
                                    <td>
                                        {{$user->last_name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        <button class="ui yellow button">
                                            <a  href="{{url("/user/$user->id/edit")}}">
                                                <i class="pencil alternate icon"></i>
                                                ویرایش
                                            </a>
                                        </button>

                                        <form action="{{url("/user/$user->id")}}" method="post" id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button  class="ui red button" id="delete-button" >
                                                <i class="trash alternate icon"></i>
                                                حذف
                                            </button>
                                        </form>
                                        <button class="ui grey button">
                                            <a href="{{url("/password/$user->id/edit")}}">
                                                <i class="pencil alternate icon"></i>
                                                تغییر رمز عبور
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
