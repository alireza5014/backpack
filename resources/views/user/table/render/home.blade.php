

<h5>لیست جداول</h5>
<div class="table-rep-plugin">
    <div class="table-wrapper">

        <div class="table-responsive">
            <table id="data-table" class="table table-hover">
                <thead class="thead-default">
                <tr>





                    <th>Name</th>
                    <th> Type</th>
                    <th> Collation</th>
                    <th>Description  </th>






                    <th> مدیریت</th>

                </tr>
                </thead>

                <tbody>
                @foreach($tables->tables as $table)
                    <tr>


                        <td><a href="{{route('user.table.list',['database_id'=>$database_id,'table'=>$table->name])}}">{{$table->name}}</a> </td>
                        <td>{{$table->type}}</td>
                        <td>{{$table->collation}}</td>
                        <td>{{$table->description}}</td>



                        <td style="width: 35%">
                            <a  class="btn btn-xs btn-outline-success line-height-25" href="" > Browse</a>
                            <a class="btn btn-xs btn-outline-warning line-height-25" href="" > Structure</a>
                            <a class="btn btn-xs btn-outline-primary line-height-25" href="" > Empty</a>
                            <a  class="btn btn-xs btn-outline-danger line-height-25"  href="" >Drop</a>
                            <a  class="btn btn-xs btn-outline-info line-height-25"  href="" ><i class="fa fa-edit fa-stack-1x"></i></a>
                            <a  class="btn btn-xs btn-outline-danger line-height-25"  href="" ><i class="fa fa-times fa-stack-1x"></i> </a>
                        </td>


                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>







