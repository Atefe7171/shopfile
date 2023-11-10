
@extends('site.layouts.master')




@section('VideoNew')



    <div class="row mt-3 mb-3">
        <div class="card" style="width: 700px !important;margin: auto">




            <h4 style="background-color: #cccccc; padding: 10px;
            text-align: center; border-radius: 10px"
                class="card-title m-2">{{'ویدئو با موضوع : '.$video_discount1->title}} </h4>







            <hr>
            <div class="row">


                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="card">
                        <a href=""><img  src="{{url('/upload/images/'.$video_discount1->image)}}" alt=""
                                         class="card-img-top"></a>
                        <div class="card-body">
                            <a style="text-align: center;" href="" class="btn btn-primary btn-block">
                                <span>{{number_format($takhfif_final_discount1)}}</span>تومان</a>
                        </div>
                        <?php
                        $yummy   = ["<p>", "</p>", "php"];
                        ?>

                        <div style="text-align: center;"
                             class="card-footer text-center">
                            {{str_replace($yummy ,'',$video_discount1->description) }}</div>

                        <div style="text-align: center;"
                             class="card-footer text-center">
                            <a style="text-align: center;"
                               href="{{route('basketdiscount.show',$idrecord)}}"
                               class="btn btn-primary btn-block">
                                اضافه کردن به سبد</a>

                        </div>


                    </div>
                </div>


            </div>



        </div>
    </div>



@endsection
