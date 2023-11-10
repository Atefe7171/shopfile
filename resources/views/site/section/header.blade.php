<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>فروشگاه فايل انلاين</title>
    {{--<link rel="stylesheet" href="{{url('css/front.css')}}">--}}
    <link rel="stylesheet" href="{{url('front/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>



<body>


<header id="main-header" class="py-2" style="background: #99e1dd; color: black !important;">
    <!-- nav with logo... -->
    <nav class="navbar navbar-expand-sm mb-2">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="input-group">
                        <button class="btn blue" type="button"><i class="fa fa-shopping-cart"></i></button>
                        <button style="color: black" class="btn blue" type="button">سبد خرید (

                            <a href="{{ url('tablebasket') }}" style="text-decoration: none;
                            outline: none;color: black">
                                {{$countbasket}}

                            </a>

                            )</button>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{route('search.store')}}" method="post">
                {{csrf_field()}}
                <div class="input-group">
                    <input  class="form-control mr-sm-0" name="search" placeholder="جست و جو">
                    <button class="btn blue my-sm-0"><i class="fa fa-search"></i></button>
                </div>
                <span style="color: red">{{@$error}}</span>
            </form>
            <a class="navbar-brand" href="#"><img width="100" src="{{url('/image/logo20.png')}}" alt=""></a>
        </div>

    </nav>
    <!-- /nav with logo... -->

    <!-- nav with menu -->

    <nav class="navbar navbar-expand-sm navbar-light blue bg-faded">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#nav-content" aria-controls="nav-content" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-content" style="margin: 0 0 0 0;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a style="color: black" class="nav-link" href="{{ url('') }}">صفحه اصلي</a>
                </li>

                @foreach($menu as $me)


                    @if($me->getChild->count()>0)

                <li class="nav-item dropdown">
                    <a style="color: black" class="nav-link dropdown-toggle" id="Preview"
                       href="{{url('category/'.$me->id)}}" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        {{$me->name}}
                    </a>

                    @else

                        <li class="nav-item">
                            <a style="color: black" class="nav-link" href="{{url('category/'.$me->id)}}"> {{$me->name}}</a>

                        @endif

                    @if($me->getChild->count()>0)
                    <div class="dropdown-menu text-center" aria-labelledby="Preview">

                        @foreach($me->getChild as $submenu)
                        <a style="color: black" class="dropdown-item"
                           href="{{url('category/'.$submenu->id)}}"> {{$submenu->name}} </a>

                            @endforeach
                    </div>
                        @endif

                </li>

                    @endforeach

            </ul>
        </div>

        <div style="position: absolute; left: 100px;">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">

                    {{--{{\Illuminate\Support\Facades\Auth::user()->name}}--}}

                    @if(\Illuminate\Support\Facades\Auth::guest())

                    <a  class="nav-link dropdown-toggle pr-3"
                       style="color:black;" id="Preview" href="" role="button" aria-haspopup="true"
                       aria-expanded="false">ورود/ثبت نام</a>
                    <div class="dropdown-menu text-center" aria-labelledby="Preview">
                        <a class="dropdown-item" href="{{ url('/register') }}">ثبت نام</a>
                        <a class="dropdown-item" href="{{ url('/login') }}">ورود</a>
                    </div>

                        @else

                    @if(\Illuminate\Support\Facades\Auth::user()->role_id==1)

                            <a class="nav-link dropdown-toggle pr-3" style="color:red;" id="Preview" href="" role="button" aria-haspopup="true" aria-expanded="false">{{ \Auth::user()->name }} خوش آمدید</a>
                            <div class="dropdown-menu text-center" aria-labelledby="Preview">
                                <a class="dropdown-item" href="{{ url('/admin') }}">ورود به پنل مدیریت</a>
                                <a class="dropdown-item" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();document.getElementById('login-form').submit()">خروج</a>
                                <form id="login-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>

                        @else

                            <a class="nav-link dropdown-toggle pr-3" style="color:red;" id="Preview" href="" role="button" aria-haspopup="true" aria-expanded="false">{{ \Auth::user()->name }} خوش آمدید</a>
                            <div class="dropdown-menu text-center" aria-labelledby="Preview">
                                <a style="color: black" class="dropdown-item" href="http://localhost:8000/purchases">پنل کاربری</a>
                                <a class="dropdown-item" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();document.getElementById('login-form').submit()">خروج</a>
                                <form id="login-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>


                        @endif
                        @endif


                </li>
            </ul>
        </div>

    </nav>

    <nav>
        <img style="width: 100%" src="{{url('/image/banner.jpg')}}" alt="">
    </nav>



    <!-- /image in header -->

</header>
<br>

</body>

</html>
