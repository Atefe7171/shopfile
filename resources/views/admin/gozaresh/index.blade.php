@extends('admin.layouts.master')

@section('content')


    <script src="{{url('scdelete/custom.js')}}"></script>



    <div class="middle">

        <h1 class="text-center title-box my-4">گزارش گیری فروش بر اساس تاریخ</h1>




        <form action="{{route('gozaresh.store')}}" method="post"
              enctype="multipart/form-data" class="text-right mr-5 mb-3">
            <div class="form-control border" style="width: 800px">


                {{csrf_field()}}

                @include('admin.section.errors')

                <div class="form-group mt-4">
                    <input type="text" class="form-control ml-2"
                           id="az" name="az" value=""
                           placeholder="از تاریخ" readonly data-jdp>
                </div>


                <div class="form-group mt-4">
                    <input type="text" class="form-control ml-2"
                           id="ta" name="ta" value=""
                           placeholder="تا تاریخ" readonly data-jdp>
                </div>

                <button type="submit" class="btn btn-outline-primary">ارسال</button>

            </div>

        </form>



    </div>
@endsection


@section('styles')

    <link rel="stylesheet"
          href="{{url('dist/jalalidatepicker.min.css')}}">


@endsection



@section('scripts')

    <script type="text/javascript" src="{{url('dist/jalalidatepicker.min.js')}}"></script>

    <script type="text/javascript">
        jalaliDatepicker.startWatch();
    </script>

@endsection



