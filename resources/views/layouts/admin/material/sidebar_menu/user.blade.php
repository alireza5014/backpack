<div class="scrollbar-inner card">
    <div class="user">
        <div class="user__info" data-toggle="dropdown">
            <img class="user__img" src="{{$path}}/demo/img/profile-pics/8.jpg" alt="">
            <div>
                <div class="user__name">{{auth($guard)->user()->fname." ".auth('user')->user()->lname}}    </div>
                <div class="user__email">{{auth($guard)->user()->email}}</div>
            </div>
        </div>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('user.profile',['id'=>auth($guard)->user()->id])}}">مشاهده
                پروفایل</a>

            <a class="dropdown-item" href="{{route('user.getLogout')}}"> خروج</a>
        </div>
    </div>

    <ul class="navigation">
        <li class="navigation__active"><a href="{{route('user.home')}}"><i class="zmdi zmdi-home"></i> میز کار</a></li>
        <li class="navigation__active"><a href="{{route('user.database.list')}}"><i class="fa fa-database"></i> لیست
                پایگاه داده ها</a></li>

        @if(isset($extraData['table']))

            <li class="navigation__sub @@variantsactive">
                <a><i class="fa fa-table"></i> مدیریت جداول</a>

                <ul style="display: block">
                    @for($i=0;$i<sizeof($extraData['table']);$i++)
                        <li class="@@sidebaractive"><a
                                href="{{route('user.table.list',['database_id'=>$extraData['database_id'],'table'=>$extraData['table'][$i]])}}"><i
                                    class="fa fa-table"></i>{{$extraData['table'][$i]}}</a></li>
                    @endfor

                </ul>
            </li>
        @endif


    </ul>
</div>
