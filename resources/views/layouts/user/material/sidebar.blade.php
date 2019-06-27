<div class="scrollbar-inner card">
    <div class="user">
        <div class="user__info" data-toggle="dropdown">
            <img class="user__img" src="" alt="">
            <div>
                <div class="user__name">{{auth('user')->user()->fname." ".auth('user')->user()->lname}}    </div>
                <div class="user__email">{{auth('user')->user()->email}}</div>
            </div>
        </div>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('user.profile',['id'=>auth('user')->user()->id])}}">مشاهده
                پروفایل</a>

            <a class="dropdown-item" href="{{route('user.getLogout')}}"> خروج</a>
        </div>
    </div>

    <ul class="navigation">
        <li class="navigation__active"><a href="{{route('user.home')}}"><i class="zmdi zmdi-home"></i> میز کار</a></li>
        <li class="navigation__active"><a href="{{route('user.database.list')}}"><i class="fa fa-database"></i> لیست
                پایگاه داده ها</a></li>

        @if(isset($tables->tables))

            <li class="navigation__sub @@variantsactive">
                <a><i class="fa fa-table"></i> مدیریت جداول</a>

                <ul style="display: block">
                    @foreach($tables->tables  as $table)
                        <li class="@@sidebaractive"><a
                                href="{{route('user.table.list',['database_id'=>$database_id,'table'=>$table->name])}}"><i
                                    class="fa fa-table"></i>  {{$table->name}}</a></li>
                    @endforeach

                </ul>
            </li>
            <li class="navigation__active"><a href="{{route('user.url.list',['database_id'=>$database_id,'table'=>$table->name])}}"><i class="zmdi zmdi-home"></i>   لینک ها</a></li>

        @endif


    </ul>
</div>
