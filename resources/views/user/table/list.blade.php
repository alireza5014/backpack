@extends('layouts.user.material.layout')
@section('header')
    @parent

    <title> لیست تابلوها </title>

    <aside class="sidebar">


        @include('layouts.user.material.sidebar')

    </aside>

@endsection

@section('content')

   {!!   makeAjaxRequest()!!}
    <div class="col-md-12">


        <div class="card">
            <a href="{{route('user.table.new',['database_id'=>$database_id,'database_name'=>$tables->name])}}" class="btn btn-success btn-xs   "   >ایجاد جدول جدید</a>
            <div class="toolbar">
                <div class="toolbar__nav">
                    <a href=""> خانه</a> <span>|</span><a href=""> جداول </a> <span>|</span> <a href=""> لیست جداول </a>
                </div>
            </div>


            <div class="card-block" id="my-block">

                @include('user.table.render.'.$render)

            </div>
        </div>
    </div>





    <script>

        function setNewModal() {
            $('#form').attr('action', '{{route('user.table.create')}}');

            $('#id').val("");
            $('#name').val("");
            $('#collection').val("");
            $('#charset').val("");
            $('#description').val("");


        }


        function setEditModal(data) {

            var data = JSON.parse(data);
            $('#form').attr('action', '{{route('user.table.modify')}}');

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#collection').val(data.collection);
            $('#charset').val(data.charset);
            $('#description').val(data.description);

        }


    </script>
@stop
