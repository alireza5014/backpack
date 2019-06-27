@include('user.table.top_menu')

<div class="table-rep-plugin">
    <div class="table-wrapper">

        <div class="table-responsive">
            <table id="data-table" class="table table-hover">
                <thead class="thead-default">
                <tr>


                        <th>Name</th>
                        <th>Type</th>
                        <th>Null</th>
                        <th>Default</th>
                        <th>Extra</th>



                    <th> مدیریت</th>

                </tr>
                </thead>

                <tbody>
                @foreach($structures as $structure)
                    <tr>

                      <td>{{$structure->Field}}</td>
                      <td>{{$structure->Type}}</td>
                      <td>{{$structure->Null}}</td>
                      <td>{{$structure->Default}}</td>
                      <td>{{$structure->Extra}}</td>
                      <td>
                          <a class="btn btn-xs btn-outline-primary line-height-25" href="" >ویرایش</a>
                          <a  class="btn btn-xs btn-outline-danger line-height-25"  href="" >حدف</a>
                      </td>



                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>




