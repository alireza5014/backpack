
@include('user.table.top_menu')
<div class="table-rep-plugin">
    <div class="table-wrapper">

        <div class="table-responsive">
            <table id="data-table" class="table table-hover">
                <thead class="thead-default">
                <tr>

                    @foreach($columns as $column)

                        <th>{{$column}}</th>

                    @endforeach


                    <th> مدیریت</th>

                </tr>
                </thead>

                <tbody>
                @foreach($data as $datum)
                    <tr>

                        @foreach($columns as $column)

                            <th>{{$datum->$column}}</th>

                        @endforeach


                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>




