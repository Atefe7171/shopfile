
@extends('site.layouts.master')


<script src="{{url('scdelete/jquery-3.0.0.min.js')}}"></script>
<script src="{{url('scdelete/jquery-3.1.1.min.js')}}"></script>



@section('slider')

    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12 m-auto">
            <div id="slider3" class="carousel slide mb-5" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="slider3" data-slide-to="0"></li>
                    <li data-target="slider3" data-slide-to="1"></li>
                    <li data-target="slider3" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="slider/slider1.jpg" class="d-block img-fluid" alt="First Slide">
                    </div>
                    <div class="carousel-item">
                        <img src="slider/slider2.jpg" class="d-block img-fluid" alt="Second Slide">
                    </div>
                    <div class="carousel-item">
                        <img src="slider/slider3.jpg" class="d-block img-fluid" alt="Third Slide">
                    </div>
                </div>
                <a href="#slider3" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#slider3" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 d-none d-lg-block m-auto">
            <div class="m-auto">
                <img src="baner/baner1.jpg" class="img-fluid mb-2" alt="Responsive image" />
            </div>
            <div class="">
                <img src="baner/baner2.jpg" class="img-fluid" alt="Responsive image" />
            </div>
        </div>
    </div>


@endsection



@section('special')

    <div class="row">
        <div class="card">

            <h4 class="card-title text-right m-2">پیشنهاد شگفت انگیز برای فیلم های آموزشی</h4>
            <div class="row">


                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <a href=""><img src="{{url('/upload/images/'.$video_discount1->image)}}" alt="" class="card-img-top"></a>
                        <div class="card-body">
                            <a style="text-align: center;" href=""><p>

                                    {{$video_discount1->title}}

                                </p></a>
                            <a style="text-align: center;" href="" class="btn btn-primary btn-block"><del>{{number_format($video_discount1->price)}}</del>تومان</a>
                            <a style="text-align: center;" href="" class="btn btn-warning btn-block"><b>{{number_format($takhfif_final_discount1)}}</b>تومان</a>
                        </div>
                        <div style="text-align: center;" class="card-footer text-center">

                            <span id="countdown4"></span>
                            :
                            <span id="countdown1"></span>
                            :
                            <span id="countdown2"></span>
                            :
                            <span id="countdown3"></span>

                        </div>


                        <div id="detail1" style="text-align: center;" class="card-footer text-center">
                            <a style="text-align: center;" href="{{url('VideoSingleDisCount/1')}}" class="btn btn-primary btn-block">
                                ادامه مطلب</a>

                        </div>

                    </div>
                </div>

                <input type="hidden" id="timer1" value="<?php echo time(); ?>">

                <?php
                $timer1_1=$discount1_tedadrooz;
                date_default_timezone_set("Asia/Tehran");
                $timestamp=$discount1_expire+$timer1_1*24*3600;
                $date=date("Y/m/d H:i:s", $timestamp);
                $exp_date=strtotime($date);
                ?>

                <script>

                    var timer1=$('#timer1').val();
                    var server_end = '<?php echo $exp_date; ?>' * 1000;
                    var server_now = timer1* 1000;
                    var client_now = new Date().getTime();

                    var end2 = server_end - server_now + client_now;

                    var _second = 1000;
                    var _minute = _second * 60;
                    var _hour = _minute * 60;
                    var _day = _hour *24;
                    var timer;


                    function showRemaining1() {

                        var now=new Date();
                        var distance=end2 - now;
                        if(distance<0){
                            clearInterval(timer);
                            document.getElementById('countdown1').innerHTML = 'پایان';
                            document.getElementById('countdown2').innerHTML = 'پایان';
                            document.getElementById('countdown3').innerHTML = 'پایان';
                            document.getElementById('countdown4').innerHTML = 'پایان';
                            $('#detail1').css('display', 'none');

                            return;
                        }

                        var days = Math.floor(distance / _day);
                        var hours = Math.floor( (distance % _day ) / _hour );
                        var minutes = Math.floor( (distance % _hour) / _minute );
                        var seconds = Math.floor( (distance % _minute) / _second );



                        var countdown1 =document.getElementById('countdown1');
                        var countdown2 =document.getElementById('countdown2');
                        var countdown3 =document.getElementById('countdown3');
                        var countdown4 =document.getElementById('countdown4');


                        countdown1.innerHTML='';
                        countdown2.innerHTML='';
                        countdown3.innerHTML='';
                        countdown4.innerHTML='';

                        countdown4.innerHTML +=days+'روز';

                        countdown1.innerHTML += hours;
                        countdown2.innerHTML += minutes;

                        if(seconds<10) {
                            countdown3.innerHTML += '0' + seconds;
                        }
                        else {
                            countdown3.innerHTML += seconds;
                        }



                    }

                    timer = setInterval(showRemaining1, 1000);

                </script>









                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <a href=""><img src="{{url('/upload/images/'.$video_discount2->image)}}" alt="" class="card-img-top"></a>
                        <div class="card-body">
                            <a style="text-align: center;" href=""><p>{{$video_discount2->title}}</p></a>
                            <a style="text-align: center;" href="" class="btn btn-primary btn-block"><del>{{number_format($video_discount2->price)}}</del>تومان</a>
                            <a style="text-align: center;" href="" class="btn btn-warning btn-block"><b>{{number_format($takhfif_final_discount2)}}</b>تومان</a>
                        </div>



                        <div style="text-align: center;" class="card-footer text-center">

                            <span id="countdown4_1"></span>
                            :
                            <span id="countdown1_1"></span>
                            :
                            <span id="countdown2_1"></span>
                            :
                            <span id="countdown3_1"></span>

                        </div>


                        <div id="detail1_1" style="text-align: center;" class="card-footer text-center">
                            <a style="text-align: center;" href="{{url('VideoSingleDisCount/2')}}" class="btn btn-primary btn-block">
                                ادامه مطلب</a>

                        </div>


                    </div>
                </div>



                <input type="hidden" id="timer1_1" value="<?php echo time(); ?>">

                <?php

                $timer1_1=$discount2_tedadrooz;
                date_default_timezone_set("Asia/Tehran");
                $timestamp=$discount2_expire+$timer1_1*24*3600;
                $date=date("Y/m/d H:i:s", $timestamp);
                $exp_date=strtotime($date);

                ?>

                <script>

                    var timer1_1=$('#timer1_1').val();
                    var server_end = <?php echo $exp_date; ?> * 1000;
                    var server_now = timer1_1* 1000;
                    var client_now = new Date().getTime();

                    var end3 = server_end - server_now + client_now;

                    var _second = 1000;
                    var _minute = _second * 60;
                    var _hour = _minute * 60;
                    var _day = _hour *24;
                    var timer;


                    function showRemaining2() {

                        var now=new Date();
                        var distance=end3 - now;
                        if(distance<0){
                            clearInterval(timer);
                            document.getElementById('countdown1_1').innerHTML = 'پایان';
                            document.getElementById('countdown2_1').innerHTML = 'پایان';
                            document.getElementById('countdown3_1').innerHTML = 'پایان';
                            document.getElementById('countdown4_1').innerHTML = 'پایان';
                            $('#detail1_1').css('display', 'none');

                            return;
                        }

                        var days = Math.floor(distance / _day);
                        var hours = Math.floor( (distance % _day ) / _hour );
                        var minutes = Math.floor( (distance % _hour) / _minute );
                        var seconds = Math.floor( (distance % _minute) / _second );



                        var countdown1 =document.getElementById('countdown1_1');
                        var countdown2 =document.getElementById('countdown2_1');
                        var countdown3 =document.getElementById('countdown3_1');
                        var countdown4 =document.getElementById('countdown4_1');


                        countdown1.innerHTML='';
                        countdown2.innerHTML='';
                        countdown3.innerHTML='';
                        countdown4.innerHTML='';

                        countdown4.innerHTML +=days+'روز';;

                        countdown1.innerHTML += hours;
                        countdown2.innerHTML += minutes;

                        if(seconds<10) {
                            countdown3.innerHTML += '0' + seconds;
                        }
                        else {
                            countdown3.innerHTML += seconds;
                        }



                    }

                    timer = setInterval(showRemaining2, 1000);

                </script>









                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <a href=""><img src="{{url('/upload/images/'.$video_discount3->image)}}" alt="" class="card-img-top"></a>
                        <div class="card-body">
                            <a style="text-align: center;" href=""><p>{{$video_discount3->title}}</p></a>
                            <a style="text-align: center;"
                               href="" class="btn btn-primary btn-block">
                                <del>{{number_format($video_discount3->price)}}</del>تومان</a>
                            <a style="text-align: center;"
                               href="" class="btn btn-warning btn-block">
                                <b>{{number_format($takhfif_final_discount3)}}</b>تومان</a>
                        </div>



                        <div style="text-align: center;" class="card-footer text-center">

                            <span id="countdown4_2"></span>
                            :
                            <span id="countdown1_2"></span>
                            :
                            <span id="countdown2_2"></span>
                            :
                            <span id="countdown3_2"></span>

                        </div>


                        <div id="detail1_2" style="text-align: center;" class="card-footer text-center">
                            <a style="text-align: center;" href="{{url('VideoSingleDisCount/3')}}" class="btn btn-primary btn-block">
                                ادامه مطلب</a>

                        </div>



                    </div>
                </div>


                <input type="hidden" id="timer1_2" value="<?php echo time(); ?>">

                <?php

                $timer1_2=$discount3_tedadrooz;
                date_default_timezone_set("Asia/Tehran");
                $timestamp=$discount3_expire+$timer1_2*24*3600;
                $date=date("Y/m/d H:i:s", $timestamp);
                $exp_date=strtotime($date);

                ?>

                <script>

                    var timer1_20=$('#timer1_2').val();
                    var server_end1 = '<?php echo $exp_date; ?>' * 1000;
                    var server_now1 = timer1_20* 1000;
                    var client_now1 = new Date().getTime();

                    var end400 = server_end1 - server_now1 + client_now1;

                    var _second1 = 1000;
                    var _minute1 = _second * 60;
                    var _hour1 = _minute * 60;
                    var _day1 = _hour *24;
                    var timer1;


                    function showRemaining3() {

                        var now1=new Date();
                        var distance1=end400 - now1;
                        if(distance1<0){
                            clearInterval(timer1);
                            document.getElementById('countdown1_2').innerHTML = 'پایان';
                            document.getElementById('countdown2_2').innerHTML = 'پایان';
                            document.getElementById('countdown3_2').innerHTML = 'پایان';
                            document.getElementById('countdown4_2').innerHTML = 'پایان';
                            $('#detail1_2').css('display', 'none');

                            return;
                        }

                        var days1 = Math.floor(distance1 / _day1);
                        var hours1 = Math.floor( (distance1 % _day1 ) / _hour1 );
                        var minutes1 = Math.floor( (distance1 % _hour1) / _minute1 );
                        var seconds1 = Math.floor( (distance1 % _minute1) / _second1 );



                        var countdown1_1 =document.getElementById('countdown1_2');
                        var countdown2_1 =document.getElementById('countdown2_2');
                        var countdown3_1 =document.getElementById('countdown3_2');
                        var countdown4_1 =document.getElementById('countdown4_2');


                        countdown1_1.innerHTML='';
                        countdown2_1.innerHTML='';
                        countdown3_1.innerHTML='';
                        countdown4_1.innerHTML='';

                        countdown4_1.innerHTML +=days1+'روز';;

                        countdown1_1.innerHTML += hours1;
                        countdown2_1.innerHTML += minutes1;

                        if(seconds1<10) {
                            countdown3_1.innerHTML += '0' + seconds1;
                        }
                        else {
                            countdown3_1.innerHTML += seconds1;
                        }



                    }

                    timer1 = setInterval(showRemaining3, 1000);

                </script>







                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <a href=""><img src="{{url('/upload/images/'.$video_discount4->image)}}" alt="" class="card-img-top"></a>
                        <div class="card-body">
                            <a style="text-align: center;" href=""><p>{{$video_discount4->title}}</p></a>
                            <a style="text-align: center;"
                               href="" class="btn btn-primary btn-block">
                                <del>{{number_format($video_discount4->price)}}</del>تومان</a>
                            <a style="text-align: center;"
                               href="" class="btn btn-warning btn-block">
                                <b>{{number_format($takhfif_final_discount4)}}</b>تومان</a>
                        </div>



                        <div style="text-align: center;" class="card-footer text-center">

                            <span id="countdown4_4"></span>
                            :
                            <span id="countdown1_4"></span>
                            :
                            <span id="countdown2_4"></span>
                            :
                            <span id="countdown3_4"></span>

                        </div>


                        <div id="detail1_4" style="text-align: center;" class="card-footer text-center">
                            <a style="text-align: center;" href="{{url('VideoSingleDisCount/4')}}" class="btn btn-primary btn-block">
                                ادامه مطلب</a>

                        </div>



                    </div>
                </div>


                <input type="hidden" id="timer1_4" value="<?php echo time(); ?>">

                <?php

                $timer1_2=$discount4_tedadrooz;
                date_default_timezone_set("Asia/Tehran");
                $timestamp=$discount4_expire+$timer1_2*24*3600;
                $date=date("Y/m/d H:i:s", $timestamp);
                $exp_date=strtotime($date);

                ?>

                <script>

                    var timer1_2=$('#timer1_4').val();
                    var server_end = '<?php echo $exp_date; ?>' * 1000;
                    var server_now = timer1_2* 1000;
                    var client_now = new Date().getTime();

                    var end4 = server_end - server_now + client_now;

                    var _second = 1000;
                    var _minute = _second * 60;
                    var _hour = _minute * 60;
                    var _day = _hour *24;
                    var timer;


                    function showRemaining4() {

                        var now=new Date();
                        var distance=end4 - now;
                        if(distance<0){
                            clearInterval(timer);
                            document.getElementById('countdown1_4').innerHTML = 'پایان';
                            document.getElementById('countdown2_4').innerHTML = 'پایان';
                            document.getElementById('countdown3_4').innerHTML = 'پایان';
                            document.getElementById('countdown4_4').innerHTML = 'پایان';
                            $('#detail1_4').css('display', 'none');

                            return;
                        }

                        var days = Math.floor(distance / _day);
                        var hours = Math.floor( (distance % _day ) / _hour );
                        var minutes = Math.floor( (distance % _hour) / _minute );
                        var seconds = Math.floor( (distance % _minute) / _second );



                        var countdown1 =document.getElementById('countdown1_4');
                        var countdown2 =document.getElementById('countdown2_4');
                        var countdown3 =document.getElementById('countdown3_4');
                        var countdown4 =document.getElementById('countdown4_4');


                        countdown1.innerHTML='';
                        countdown2.innerHTML='';
                        countdown3.innerHTML='';
                        countdown4.innerHTML='';

                        countdown4.innerHTML +=days+'روز';;

                        countdown1.innerHTML += hours;
                        countdown2.innerHTML += minutes;

                        if(seconds<10) {
                            countdown3.innerHTML += '0' + seconds;
                        }
                        else {
                            countdown3.innerHTML += seconds;
                        }



                    }

                    timer = setInterval(showRemaining4, 1000);

                </script>







                {{--//////////////End--}}








                <div class="col-lg-3 col-md-6 col-sm-12" style="display: none">
                    <div class="card">
                        <a href=""><img src="image/word.png" alt="" class="card-img-top"></a>
                        <div class="card-body">
                            <a style="text-align: center;" href=""><p>آموزش ورد</p></a>
                            <a style="text-align: center;" href="" class="btn btn-primary btn-block"><del>1.500.000</del>تومان</a>
                            <a style="text-align: center;" href="" class="btn btn-warning btn-block"><del>1.300.000</del>تومان</a>
                        </div>



                        <div style="text-align: center;" class="card-footer text-center">

                            <span id="countdown4_5"></span>
                            :
                            <span id="countdown1_5"></span>
                            :
                            <span id="countdown2_5"></span>
                            :
                            <span id="countdown3_5"></span>

                        </div>


                        <div id="detail1_5" style="text-align: center;" class="card-footer text-center">
                            <a style="text-align: center;" href="" class="btn btn-primary btn-block">
                                ادامه مطلب</a>

                        </div>



                    </div>
                </div>


                <input type="hidden" id="timer1_5" value="<?php echo time(); ?>">

                <?php

                $timer1_2=7;
                date_default_timezone_set("Asia/Tehran");
                $timestamp=time()+$timer1_2*24*3600;
                $date=date("Y/m/d H:i:s", $timestamp);
                $exp_date=strtotime($date);

                ?>

                <script>

                    var timer1_2=$('#timer1_5').val();
                    var server_end = '<?php echo $exp_date; ?>' * 1000;
                    var server_now = timer1_2* 1000;
                    var client_now = new Date().getTime();

                    var end41 = server_end - server_now + client_now;

                    var _second = 1000;
                    var _minute = _second * 60;
                    var _hour = _minute * 60;
                    var _day = _hour *24;
                    var timer;


                    function showRemaining5() {

                        var now=new Date();
                        var distance=end41 - now;
                        if(distance<0){
                            clearInterval(timer);
                            document.getElementById('countdown1_5').innerHTML = 'پایان';
                            document.getElementById('countdown2_5').innerHTML = 'پایان';
                            document.getElementById('countdown3_5').innerHTML = 'پایان';
                            document.getElementById('countdown4_5').innerHTML = 'پایان';
                            $('#detail1_5').css('display', 'none');

                            return;
                        }

                        var days = Math.floor(distance / _day);
                        var hours = Math.floor( (distance % _day ) / _hour );
                        var minutes = Math.floor( (distance % _hour) / _minute );
                        var seconds = Math.floor( (distance % _minute) / _second );



                        var countdown1 =document.getElementById('countdown1_5');
                        var countdown2 =document.getElementById('countdown2_5');
                        var countdown3 =document.getElementById('countdown3_5');
                        var countdown4 =document.getElementById('countdown4_5');


                        countdown1.innerHTML='';
                        countdown2.innerHTML='';
                        countdown3.innerHTML='';
                        countdown4.innerHTML='';

                        countdown4.innerHTML +=days;

                        countdown1.innerHTML += hours;
                        countdown2.innerHTML += minutes;

                        if(seconds<10) {
                            countdown3.innerHTML += '0' + seconds;
                        }
                        else {
                            countdown3.innerHTML += seconds;
                        }



                    }

                    timer = setInterval(showRemaining5, 1000);

                </script>








            </div>

        </div>
    </div>

@endsection




@section('new')



    <div class="row mt-3 mb-3">
        <div class="card">
            <h4 class="card-title text-right m-2">کتاب هاي جديد</h4>
            <div class="row">


                @foreach($lastBook as $last)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <a href=""><img width="200" height="150" src="{{url('/upload/images/'.$last->image)}}" alt="" class="card-img-top"></a>
                            <div class="card-body">
                                <a style="text-align: center;" href=""><p>

                                        <?php

                                        if(mb_strlen($last['title'])>24){
                                            echo mb_substr($last['title'],0,24).'...';
                                        }else{

                                            echo $last['title'];

                                        }

                                        ?>


                                    </p></a>
                                <a style="text-align: center;" href="" class="btn btn-primary btn-block">
                                    <span>{{number_format($last->price)}}</span>تومان</a>
                                <a style="text-align: center;" href="" class="btn btn-warning btn-block">
                                    <?php
                                    if($last->type==0)

                                        echo "نقدی";

                                    else

                                        echo "رایگان";
                                    $yummy   = ["<p>", "</p>", "php"];
                                    ?>

                                </a>
                            </div>
                            <div style="text-align: center;" class="card-footer text-center">
                                <a style="text-align: center;" href="{{url('BookSingle/'.$last->id)}}" class="btn btn-primary btn-block">
                                    ادامه مطلب</a>

                            </div>
                        </div>
                    </div>
                @endforeach







            </div>



        </div>
    </div>

@endsection




@section('VideoNew')



    <div class="row mt-3 mb-3">
        <div class="card">
            <h4 class="card-title text-right m-2">ویدئوهاي جديد</h4>
            <div class="row">


                @foreach($lastVideo as $last)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <a href=""><img  src="{{url('/upload/images/'.$last->image)}}" alt=""
                                             class="card-img-top"></a>
                            <div class="card-body">
                                <a style="text-align: center;" href=""><p>

                                        <?php

                                        if(mb_strlen($last['title'])>24){
                                            echo mb_substr($last['title'],0,24).'...';
                                        }else{

                                            echo $last['title'];

                                        }

                                        ?>

                                    </p></a>
                                <a style="text-align: center;" href="" class="btn btn-primary btn-block">
                                    <span>{{number_format($last->price)}}</span>تومان</a>
                                <a style="text-align: center;" href="" class="btn btn-warning btn-block">
                                    <?php
                                    if($last->type==0)

                                        echo "نقدی";

                                    else

                                        echo "رایگان";
                                    $yummy   = ["<p>", "</p>", "php"];
                                    ?>

                                </a>
                            </div>


                            <div style="text-align: center;" class="card-footer text-center">
                                <a style="text-align: center;" href="{{url('VideoSingle/'.$last->id)}}" class="btn btn-primary btn-block">
                                    ادامه مطلب</a>

                            </div>

                        </div>
                    </div>
                @endforeach







            </div>



        </div>
    </div>

@endsection
