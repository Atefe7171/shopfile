
@extends('site.layouts.master')




@section('VideoNew')



    <div class="row mt-3 mb-3">
        <div class="card" style="width: 700px !important;margin: auto">




            <h4 style="background-color: #cccccc; padding: 10px;
            text-align: center; border-radius: 10px"
                class="card-title m-2">{{'کتاب با موضوع : '.$book->title}} </h4>







            <hr>
            <div class="row">


                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card">
                            <a href=""><img  src="{{url('/upload/images/'.$book->image)}}" alt=""
                                             class="card-img-top"></a>
                            <div class="card-body">
                                <a style="text-align: center;" href="" class="btn btn-primary btn-block">
                                    <span>{{number_format($book->price)}}</span>تومان</a>
                                <a style="text-align: center;" href="" class="btn btn-warning btn-block">
                                    <?php
                                    if($book->type==0)

                                        echo "نقدی";

                                    else

                                        echo "رایگان";
                                    $yummy   = ["<p>", "</p>", "php"];
                                    ?>

                                </a>
                            </div>
                            <div style="text-align: center;"
                                 class="card-footer text-center">
                                {{str_replace($yummy ,'',$book->description) }}</div>

                            <div style="text-align: center;"
                                 class="card-footer text-center">
                                <a style="text-align: center;" href="{{route('basket.edit',$book->id)}}" class="btn btn-primary btn-block">
                                    اضافه کردن به سبد</a>

                            </div>


                        </div>
                    </div>


            </div>



        </div>
    </div>



@endsection
