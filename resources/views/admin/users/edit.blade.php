@extends('layouts.material.layout')
@section('header')

    <title>    ویرایش کاربر</title>
    @parent
@endsection
@section('content')

    <div class="col-md-12">

        <div class="card">
            <div class="toolbar">
                <div class="toolbar__nav">
                    <a href=""> خانه</a>
                    <span>|</span>
                    <a >کاربران</a>
                    <span>|</span>

                    <a href="">     ویرایش کاربر</a>
                </div>
            </div>

            <div class="col-md-6 offset-md-3 card-block">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.modify') }}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}



                    <div class="form-group form-group--float form-group--centered">
                        <input id="fname" type="text" class="form-control" name="fname" value="{{$user->fname}}"
                        >
                        <label> نام </label>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group form-group--float form-group--centered">
                        <input id="lname" type="text" class="form-control" name="lname"  value="{{$user->lname}}"
                        >
                        <label> نام خانوادگی</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group form-group--float form-group--centered">
                        <input id="mobile" type="text" class="form-control" name="mobile" value="{{$user->mobile}}"
                        >
                        <label> موبایل </label>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group form-group--float form-group--centered">
                        <input id="password" type="password" class="form-control" name="password" value=""
                        >
                        <label> گذرواژه</label>
                        <i class="form-group__bar"></i>
                    </div>


                    <div class="form-group form-group--float form-group--centered">
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" value=""
                        >
                        <label>تکرار گذرواژه</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group form-group--float form-group--centered">
                        <textarea id="address" rows="2" placeholder="آدرس" class="form-control" name="address"  >{{$user->address}}</textarea>

                        <i class="form-group__bar"></i>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="zmdi zmdi-edit"></i> ویرایش کاربر
                            </button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>
@stop
