<ul class="list-inline">

    <li class="list-inline-item" >    <a class="btn btn-block btn-outline-primary"   href="{{route('user.table.list',['database_id'=>$database_id,'table'=>$table,'render'=>'home'])}}" >home</a>
    </li>
    <li class="list-inline-item" >    <a class="btn btn-block btn-outline-primary"   href="{{route('user.table.list',['database_id'=>$database_id,'table'=>$table,'render'=>'browse'])}}" >browse</a>
    </li>
    <li class="list-inline-item" >    <a class="btn btn-block btn-outline-primary"  href="{{route('user.table.list',['database_id'=>$database_id,'table'=>$table,'render'=>'structure'])}}" >structure</a>
    </li>

</ul>
