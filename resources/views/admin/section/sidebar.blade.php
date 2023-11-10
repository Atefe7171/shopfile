
<div class="sidebar" style="height: 1000px">
    <div class="head">
        <img src="{{url('images/avatar5.jpg')}}">
        <h3>پنل مدیریت سایت PHP MVC</h3>

        <div class="level-user">
            <span class="label-name">سطح مدیریتی : </span>
            <span class="label-level">مدیر اصلی </span>
        </div>
        <div class="clear"></div>
    </div>

    <style>

        #menumain li{
            text-align: right;
        }

    </style>

    <div class="menu">
        <UL id="menumain">
            <li><a style="color: white">پیشخوان</a></li>
            <li class="has-sub"><a style="color: white" href="#">دوره ها</a>
                <ul>
                    <li><a href="#">افزودن</a></li>
                    <li><a href="#">نمایش دوره ها</a></li>
                </ul>
            </li>

            <li class="has-sub"><a style="color: white">دسته ها</a>
                <ul>
                    <li><a href="{{route('category.create')}}">افزودن</a></li>
                    <li><a href="{{route('category.index')}}">نمایش دسته ها</a></li>
                </ul>
            </li>

            <li class="has-sub"><a style="color: white"  >کتاب</a>
                <ul>
                    <li><a href="{{route('book.create')}}">افزودن کتاب</a></li>
                    <li><a href="{{route('book.index')}}">نمایش کتاب</a></li>
                </ul>
            </li>

            <li class="has-sub"><a style="color: white">ویدئو</a>
                <ul>
                    <li><a href="{{route('video.create')}}">افزودن ویدئو</a></li>
                    <li><a href="{{route('video.index')}}">نمایش ویدئو</a></li>
                </ul>
            </li>

            <li class="has-sub" style="color: white"><a >سفارشات</a>
                <ul>
                    <li><a href="#">نمایش سفارشات</a></li>
                </ul>
            </li>
            <li class="has-sub"><a style="color: white">مدیریت اسلایدر</a>
                <ul>
                    <li><a href="{{route('slider.index')}}">نمایش اسلایدها</a></li>
                    <li><a href="{{route('slider.create')}}">افزودن به اسلایدر</a></li>
                </ul>
            </li>
            <li class="has-sub" style="color: white"><a>مدیریت بنر</a>
                <ul>
                    <li><a href="{{route('baner.index')}}">نمایش بنرها</a></li>
                    <li><a href="{{route('baner.create')}}">افزودن بنر</a></li>
                </ul>
            </li>



            <li><a style="color: white" href="{{route('discount.index')}}">تخفیفات</a></li>
            <li><a style="color: white" href="{{route('gozaresh.index')}}">گزارشات</a></li>

        </UL>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

