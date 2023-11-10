
@extends('site.layouts.master')




@section('VideoNew')



    <div class="row mt-3 mb-3">
        <div class="card">

          <?php

           if(sizeof($nameMainMenuTest)<1) {

            ?>



                <h4 style="background-color: #cccccc; padding: 10px;
            text-align: center; border-radius: 10px"
                    class="card-title m-2">{{'کتاب ها : '.$namemenu->name}} </h4>
              <?php }else{

               ?>


              <h6 style="background-color: #cccccc; padding: 10px;
            text-align: center; border-radius: 10px"
                  class="card-title m-2">{{'کتاب ها : '.$nameMainMenu->name.
                '-'.$namemenu->name}} </h6>

<?php } ?>







            <hr>
            <div class="row">


                @foreach($book as $last)
                    <div class="<?php if(sizeof($book)>1){echo 'col-lg-3 col-md-6 col-sm-12';}
                    else{echo 'col-md-7 col-sm-12';} ?>">
                        <div class="card">
                            <a href=""><img  src="{{url('/upload/images/'.$last->image)}}" alt=""
                                             class="card-img-top"></a>
                            <div class="card-body">
                                <a style="text-align: center;" href=""><p>{{$last->title}}</p></a>
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




    @if($video->isEmpty())




    @else




    <div class="row mt-3 mb-3">
        <div class="card">

            <?php

            if(sizeof($nameMainMenuTest)<1) {

            ?>



            <h4 style="background-color: #cccccc; padding: 10px;
            text-align: center; border-radius: 10px"
                class="card-title m-2">{{'ویدئوها : '.$namemenu->name}} </h4>
            <?php }else{

            ?>


            <h6 style="background-color: #cccccc; padding: 10px;
            text-align: center; border-radius: 10px"
                class="card-title m-2">{{'ویدئوها : '.$nameMainMenu->name.
                '-'.$namemenu->name}} </h6>

            <?php } ?>







            <hr>
            <div class="row">


                @foreach($video as $last)
                    <div class="<?php if(sizeof($video)>1){echo 'col-lg-3 col-md-6 col-sm-12';}
                    else{echo 'col-md-7 col-sm-12';} ?>">
                        <div class="card">
                            <a href=""><img  src="{{url('/upload/images/'.$last->image)}}" alt=""
                                             class="card-img-top"></a>
                            <div class="card-body">
                                <a style="text-align: center;" href=""><p>{{$last->title}}</p></a>
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

    @endif

@endsection
