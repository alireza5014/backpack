@extends('layouts.user.material.layout')
@section('header')
    @parent

    <title> ایجاد جدول جدید </title>

    <aside class="sidebar">


        @include('layouts.user.material.sidebar')

    </aside>

@endsection

@section('content')


    <div class="col-md-12">


        <div class="card">
            <a href="{{route('user.table.list',['database_id'=>$database_id,'database_name'=>$database_name])}}"
               class="btn btn-success btn-xs   "> لیست جداول </a>
            <div class="toolbar">
                <div class="toolbar__nav">
                    <a href=""> خانه</a> <span>|</span><a href=""> جداول </a> <span>|</span> <a href=""> ایجاد جدول
                        جدید </a>
                </div>
            </div>


            <div class="card-block">

                <form id="form" class="form-horizontal" method="POST" action="{{route('user.table.create')}}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input id="database_id" type="hidden" name="database_id" value="{{$database_id}}"/>
                        <input id="database_name" type="hidden" name="database_name" value="{{$database_name}}"/>
                        {{csrf_field()}}

                        <div class="col-md-8 offset-2">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group form-group--float   ">
                                        <input id="name" type="text" class="form-control " name="name"
                                               required>
                                        <label> نام جدول </label>
                                        <i class="form-group__bar"></i>

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group--float   ">
                                        <select id="collation" class="form-control " name="collation" required>
                                            <option value="utf8mb4_unicode_ci">utf8mb4_unicode_ci</option>
                                            <option value="utf8_unicode_ci">utf8_unicode_ci</option>
                                        </select>
                                        <label> collation </label>
                                        <i class="form-group__bar"></i>

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group--float   ">
                                        <input id="description" type="text" class="form-control "
                                               name="description"
                                               required>
                                        <label> توضیحات </label>
                                        <i class="form-group__bar"></i>
                                    </div>

                                </div>
                            </div>
                            <button type="button" id="add_new_column" class="btn btn-xs btn-primary btn-block">
                                <i class="fa fa-plus"></i>
                                اضافه کردن ستون جدید
                            </button>
                        </div>
                        <div class="row">

                            <div class="card-block">


                                <div class="col-md-12" id="column_block">
                                    <div class="row"  >

                                        <div class="col-md-3">

                                            <div class="form-group form-group--float   ">
                                                <input  type="text" class="form-control "
                                                       name="column_name[]"
                                                       required>
                                                <label> نام ستون </label>
                                                <i class="form-group__bar"></i>

                                            </div>

                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group form-group--float   ">
                                                <select   type="text" class="form-control "
                                                        name="column_type[]"
                                                        required>
                                                    <option value="int">Int</option>
                                                    <option value="varchar">Varchar</option>
                                                    <option value="text">Text</option>
                                                </select>
                                                <label> نوع ستون </label>
                                                <i class="form-group__bar"></i>


                                            </div>

                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group form-group--float   ">
                                                <input   type="text" class="form-control "
                                                       name="length[]"
                                                       required>
                                                <label> Length </label>
                                                <i class="form-group__bar"></i>

                                            </div>

                                        </div>
                                        <div class="col-md-2">

                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" name="is_auto_increment[]" value="1"
                                                       class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">is_auto_increment</span>
                                            </label>

                                        </div>
                                        <div class="col-md-1">


                                         </div>
                                    </div>


                                </div>


                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" id="project_btn" class="btn   btn-block btn-outline-primary  ">
                                ذخیره
                                <i style="display: none" id="loader40" class="fa fa-spinner fa-spin "></i>

                            </button>


                            <button type="button" class="btn btn-outline-info" data-dismiss="modal">بستن</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>


    <script>

        $(document).ready(function () {

            $("#add_new_column").on("click", function (e) {
                var rand1=Math.floor(Math.random()*1000);
                var rand=""+rand1;

                $('#column_block').append('                                    <div class="row" id='+rand+'  >\n' +
                    '\n' +
                    '                                        <div class="col-md-3">\n' +
                    '\n' +
                    '                                            <div class="form-group form-group--float   ">\n' +
                    '                                                <input  type="text" class="form-control "\n' +
                    '                                                       name="column_name[]"\n' +
                    '                                                       required>\n' +
                    '                                                <label> نام ستون </label>\n' +
                    '                                                <i class="form-group__bar"></i>\n' +
                    '\n' +
                    '                                            </div>\n' +
                    '\n' +
                    '                                        </div>\n' +
                    '                                        <div class="col-md-3">\n' +
                    '\n' +
                    '                                            <div class="form-group form-group--float   ">\n' +
                    '                                                <select   type="text" class="form-control "\n' +
                    '                                                        name="column_type[]"\n' +
                    '                                                        required>\n' +
                 
                    '                                                    <option value="int">Int</option>\n' +
                    '                                                    <option value="varchar">varchar</option>\n' +
                    '                                                    <option value="text">Text</option>\n' +
                    '                                                    <option value="timestamp">timestamp</option>\n' +
                    '                                                </select>\n' +
                    '                                                <label> نوع ستون </label>\n' +
                    '                                                <i class="form-group__bar"></i>\n' +
                    '\n' +
                    '\n' +
                    '                                            </div>\n' +
                    '\n' +
                    '                                        </div>\n' +
                    '                                        <div class="col-md-3">\n' +
                    '\n' +
                    '                                            <div class="form-group form-group--float   ">\n' +
                    '                                                <input   type="text" class="form-control "\n' +
                    '                                                       name="length[]"\n' +
                    '                                                       required>\n' +
                    '                                                <label> Length </label>\n' +
                    '                                                <i class="form-group__bar"></i>\n' +
                    '\n' +
                    '                                            </div>\n' +
                    '\n' +
                    '                                        </div>\n' +
                    '                                        <div class="col-md-2">\n' +
                    '\n' +
                    '                                            <label class="custom-control custom-checkbox">\n' +
                    '                                                <input type="checkbox"  name="is_auto_increment[]"\n' +
                    '                                                       class="custom-control-input">\n' +
                    '                                                <span class="custom-control-indicator"></span>\n' +
                    '                                                <span class="custom-control-description">is_auto_increment</span>\n' +
                    '                                            </label>\n' +
                    '\n' +
                    '                                        </div>\n' +
                    '                                        <div class="col-md-1">\n' +
                    '\n' +
                    '                                            <label class="custom-control custom-checkbox">\n' +
                    '                                                <button type="button" onclick="remove_column('+rand+') "    ><i class="fa fa-times fa-2x"></i></button>\n' +
                    '                                            </label>\n' +
                    '                                         </div>\n' +
                    '                                    </div>\n');
            })
        });

        function remove_column(id) {
            $('#'+id).remove();
        }

        // $('.remove_column').on('click', function(){
        //     $(this).closest(".row").remove();
        // });
    </script>
@stop
