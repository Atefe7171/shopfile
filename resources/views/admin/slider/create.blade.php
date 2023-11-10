@extends('admin.layouts.master')

@section('content')

    <script src="{{url('scdelete/jquery-3.0.0.min.js')}}"></script>
    <script src="{{url('scdelete/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('scdelete/custom.js')}}"></script>

    <div class="middle">

        <h1 class="text-center title-box my-4">مدیریت اسلایدر</h1>


        <form action="{{route('slider.store')}}" method="post"
              enctype="multipart/form-data" class="text-right mr-5 mb-3">
            <div class="form-control border" style="width: 800px">

                {{csrf_field()}}

                @include('admin.section.errors')


                <div class="form-group mt-4">
                    <label for="image">اسلاید اول</label>

                    <input type="file" class="form-control ml-2"
                           id="slide1" name="slide1">
                </div>

                <div class="form-group mt-4">
                    <label for="path">اسلاید دوم</label>

                    <input type="file" class="form-control ml-2"
                           id="slide2" name="slide2">
                </div>

                <div class="form-group mt-4">
                    <label for="path">اسلاید سوم</label>

                    <input type="file" class="form-control ml-2"
                           id="slide3" name="slide3">
                </div>

                <button type="submit" class="btn btn-outline-primary">ارسال</button>

            </div>

        </form>



    </div>
@endsection