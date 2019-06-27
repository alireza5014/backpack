<h5>لیست لینک های دیتابیس {{$data->name}}</h5>
<div class="table-rep-plugin">
    <div class="table-wrapper">

        <div class="table-responsive">
            <table id="data-table" class="table table-hover">
                <thead class="thead-default">
                <tr>


                    <th>#</th>
                    <th> Database Name</th>
                    <th> Table Name</th>
                    <th> Url Name</th>
                    <th>Link</th>
                    <th>Method</th>
                    <th>Created At</th>


                    <th> مدیریت</th>

                </tr>
                </thead>

                <tbody>
                @foreach($data->urls as $url)
                    <tr>

                        <td>{{ $url->id}}</td>
                        <td>{{ $data->name}}</td>
                        <td>{{ $url->table->name}}</td>

                        <td>{{ $url->title}}</td>
                        <td>{{ url($url->link)}}</td>
                        <td>{{ $url->method}}</td>
                        <td>{{ $url->created_at}}</td>


                        <td style="width: 35%">
                            <a class="btn btn-xs btn-outline-success line-height-25" href=""> Browse</a>
                            <a class="btn btn-xs btn-outline-warning line-height-25" href=""> Structure</a>
                            <a class="btn btn-xs btn-outline-primary line-height-25" href=""> Empty</a>
                            <a class="btn btn-xs btn-outline-danger line-height-25" href="">Drop</a>
                            <a class="btn btn-xs btn-outline-info line-height-25" href=""><i
                                    class="fa fa-edit fa-stack-1x"></i></a>
                            <a class="btn btn-xs btn-outline-danger line-height-25" href=""><i
                                    class="fa fa-times fa-stack-1x"></i> </a>
                        </td>


                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>







