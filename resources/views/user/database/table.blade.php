<div class="row">

    @foreach($data as $datum)
        <div class="col-sm-6 col-md-6 col-lg-3">


            <div class="card">
                <div class="card-block">


                    <h4 class="mt-3">{{$datum->name}}</h4>
                    <p>{{$datum->description}}</p>
                    <code class="pull-left">{{$datum->created_at}}</code>
                </div>


                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="{{route('user.table.list',['database_id'=>$datum->id])}}"
                           class="btn   btn-outline-success btn-block  "><i class="fa fa-dashboard fa-2x"></i> </a>

                    </li>


                    <li class="list-inline-item">
                        <a href="{{route('user.table.list',['database_id'=>$datum->id])}}"
                           class="btn   btn-outline-primary btn-block  "><i class="fa fa-hand-paper-o fa-2x"></i> </a>

                    </li>

                    <li class="list-inline-item">
                        <a
                            data-toggle="modal"
                            data-target="#modal-small" onclick="setEditModal('{{$datum}}')"
                            href="{{route('user.table.list',['database_id'=>$datum->id])}}"
                           class="btn   btn-outline-info btn-block  "><i class="fa fa-edit fa-2x"></i> </a>

                    </li>
                    <li class="list-inline-item">
                        <a href="{{route('user.table.list',['database_id'=>$datum->id])}}"
                           class="btn   btn-outline-danger btn-block  "><i class="fa fa-times fa-2x"></i> </a>

                    </li>
                </ul>


                </ul>


            </div>

        </div>
    @endforeach


</div>


{{$data->appends($_GET)->links()}}



