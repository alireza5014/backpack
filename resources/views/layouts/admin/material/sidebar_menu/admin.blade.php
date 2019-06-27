<div class="scrollbar-inner card">
    <div class="user">
        <div class="user__info" data-toggle="dropdown">
            <img class="user__img" src="{{$path}}/demo/img/profile-pics/8.jpg" alt="">
            <div>
                <div class="user__name">{{auth($guard)->user()->fname." ".auth($guard)->user()->lname}}    </div>
                <div class="user__email">{{auth($guard)->user()->email}}</div>
            </div>
        </div>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('admin.profile')}}">مشاهده
                پروفایل</a>

            <a class="dropdown-item" href="{{route('admin.getLogout')}}"> خروج</a>
        </div>
    </div>


    <ul class="navigation">

        <li class="navigation__sub @@variantsactive">
            <a><i class="zmdi zmdi-account"></i> کاربران </a>

            <ul>
                <li class="@@sidebaractive"><a href="{{route('user.new')}}">ایجاد کاربر جدید</a></li>
                <li class="@@sidebaractive"><a href="{{route('user.list')}}">لیست کاربران</a></li>

            </ul>
        </li>


        <li class="navigation__active"><a href="{{url('')}}"><i class="zmdi zmdi-settings"></i> تنظیمات</a></li>

    </ul>


</div>
