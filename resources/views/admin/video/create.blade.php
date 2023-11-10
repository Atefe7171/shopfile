@extends('admin.layouts.master')

@section('content')

    <script src="{{url('ckeditor/ckeditor.js')}}"></script>

    <script src="{{url('scdelete/jquery-3.0.0.min.js')}}"></script>
    <script src="{{url('scdelete/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('scdelete/custom.js')}}"></script>



    <div class="middle">

        <h1 class="text-center title-box my-4">افزودن ویدئو</h1>




        <form action="{{route('video.store')}}" method="post"
              enctype="multipart/form-data" class="text-right mr-5 mb-3">
            <div class="form-control border" style="width: 800px">

                @isset($result)

                    @if(sizeof($result)>0)

                        <span style="background-color: red; color: white; padding: 2px;
            text-align: center; font-size: 12pt; margin-top: 10px">
                 عکس یا فایل انتخاب شده تکراری می باشد
            </span>

                        @endif

                    @endisset


            {{csrf_field()}}

                @include('admin.section.errors')

                <div class="form-group mt-4">
            <input type="text" class="form-control ml-2"
                   id="title" name="title" value="{{old('title')}}"
                   placeholder="عنوان ویدئو را وارد نمایید">
                </div>

            <div class="form-group mt-4">
                <label for="type">نوع ویدئو</label>
                <select style="height: 40px" class="form-control" name="type" id="type">

                    <option value="0">نقدی</option>
                    <option value="1">رایگان</option>
                </select>
            </div>


                <div class="form-group mt-4">
                    <textarea name="description" id="description" placeholder="توضیحات ویدئو را وارد نمایید"
                              cols="30" rows="5" class="form-control"></textarea>
                </div>


                <script>

                    CKEDITOR.replace('description',{});
                </script>




                <div class="form-group mt-4">
                    <label for="image">عکس ویدئو</label>

                    <input type="file" class="form-control ml-2"
                           id="image" name="image">
                </div>

                <div class="form-group mt-4">
                    <label for="path">فایل ویدئو</label>

                    <input type="file" class="form-control ml-2"
                           id="path" name="path">
                </div>


                <div class="form-group mt-4">
                    <label for="category_id">نام دسته اصلی</label>
                    <select  style="height: 40px" class="form-control selectpicker"
                            name="category_id[]" id="category_id" multiple>

                        {{--<option value="0">---</option>--}}

                        @foreach($category as $key=>$value)

                            <option value="{{$key}}">{{$value}}</option>

                        @endforeach

                    </select>
                </div>


                <div class="form-group mt-4">

                    <input type="text" class="form-control ml-2"
                          onkeyup="this.value=addCommas(this.value)"
                           id="price" name="price" value="{{old('price')}}"
                           placeholder="قیمت ویدئو را وارد نمایید">

                </div>


                <button type="submit" class="btn btn-outline-primary">ارسال</button>

            </div>

        </form>



</div>
@endsection


@section('styles')

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">


@endsection



@section('scripts')

    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>

    <script type="text/javascript">
        $('.selectpicker').selectpicker();
    </script>


@endsection



