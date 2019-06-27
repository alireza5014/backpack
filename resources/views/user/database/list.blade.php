@extends('layouts.user.material.layout')

@section('header')
    @parent

    <title> لیست پروژه ها </title>

    <aside class="sidebar">


        @include('layouts.user.material.sidebar')

    </aside>


@endsection


@section('content')


    <div class="modal fade" id="modal-small" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left"></h5>
                </div>

                <form id="form" class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input id="id" name="id" type="hidden"/>
                        {{csrf_field()}}

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group form-group--float   ">
                                    <input id="name" type="text" class="form-control " name="name"
                                           required>
                                    <label> نام دیتابیس </label>
                                    <i class="form-group__bar"></i>

                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group form-group--float   ">
                                    <select id="collection" class="form-control " name="collection" required>
                                        <option value="utf8mb4_unicode_ci">utf8mb4_unicode_ci</option>
                                        <option value="utf8_unicode_ci">utf8_unicode_ci</option>
                                    </select>
                                    <label> collection </label>
                                    <i class="form-group__bar"></i>

                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group form-group--float   ">
                                    <select id="charset" class="form-control " name="charset" required>
                                        <option value="utf8mb4">utf8mb4</option>
                                        <option value="utf8">utf8</option>
                                    </select>
                                    <label> collection </label>
                                    <i class="form-group__bar"></i>

                                </div>

                            </div>


                            <div class="col-md-12">
                                <div class="form-group form-group--float   ">
                                    <input id="description" type="text" class="form-control " name="description"
                                           required>
                                    <label> توضیحات </label>
                                    <i class="form-group__bar"></i>
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


                </form>

            </div>

        </div>
    </div>

    <div class="col-md-12">


        <div class="card">

            <div class="toolbar">
                <div class="toolbar__nav">
                    <a href=""> خانه</a> <span>|</span><a href=""> دیتابیس ها </a> <span>|</span> <a href=""> لیست
                        دیتابیس ها </a>
                </div>
            </div>
            <a href="" class="btn btn-success btn-xs   " onclick="setNewModal()" data-toggle="modal"
               data-target="#modal-small">ایجاد دیتابیس جدید</a>

            <div class="card-block" id="my-block">


                @include('user.database.table')

            </div>
        </div>
    </div>



    <script>

        function setNewModal() {
            $('#form').attr('action', '{{route('user.database.create')}}');

            $('#id').val("");
            $('#name').val("");
            $('#collection').val("");
            $('#charset').val("");
            $('#description').val("");


        }


        function setEditModal(data) {

            var data = JSON.parse(data);
            $('#form').attr('action', '{{route('user.database.modify')}}');
            $('#name').attr('disabled','true');

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#collection').val(data.collection);
            $('#charset').val(data.charset);
            $('#description').val(data.description);

        }


    </script>


@stop


