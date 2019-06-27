@extends('layouts.user.material.layout')

@section('header')
    @parent

    <title> لیست لینک ها </title>

    <aside class="sidebar">


        @include('layouts.user.material.sidebar')

    </aside>


@endsection


@section('content')


    <div class="col-md-12">


        <div class="card">

            <div class="toolbar">
                <div class="toolbar__nav">
                    <a href=""> خانه</a> <span>|</span><a href=""> لینک ها </a> <span>|</span> <a href=""> لیست
                        لینک ها </a>
                </div>
            </div>
            <a href="" class="btn btn-success btn-xs   " onclick="setNewModal()" data-toggle="modal"
               data-target="#modal-small">ایجاد لینک جدید</a>

            <div class="card-block" id="my-block">


                @include('user.url.render.table')

            </div>
        </div>
    </div>






@stop


