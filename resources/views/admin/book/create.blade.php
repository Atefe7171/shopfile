@extends('admin.layouts.master')

@section('content')

    <script src="{{url('scdelete/jquery-3.0.0.min.js')}}"></script>
    <script src="{{url('scdelete/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('scdelete/custom.js')}}"></script>


    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <div class="middle">

        <h1 class="text-center title-box my-4">افزودن کتاب</h1>


        <form action="{{route('book.store')}}" method="post"
              enctype="multipart/form-data" class="text-right mr-5 mb-3">
            <div class="form-control border" style="width: 800px">

            {{csrf_field()}}

                @include('admin.section.errors')

                <div class="form-group mt-4">
            <input type="text" class="form-control ml-2"
                   id="title" name="title" value="{{old('title')}}"
                   placeholder="عنوان کتاب را وارد نمایید">
                </div>

            <div class="form-group mt-4">
                <label for="type">نوع کتاب</label>
                <select style="height: 40px" class="form-control" name="type" id="type">

                    <option value="0">نقدی</option>
                    <option value="1">رایگان</option>
                </select>
            </div>


                <div class="form-group mt-4">
                    <textarea name="description" id="description" placeholder="توضیحات کتاب را وارد نمایید"
                              cols="30" rows="5" class="form-control"></textarea>
                </div>


                <script>

                    CKEDITOR.replace('description',{});
                </script>




                <div class="form-group mt-4">
                    <label for="image">عکس کتاب</label>

                    <input type="file" class="form-control ml-2"
                           id="image" name="image">
                </div>

                <div class="form-group mt-4">
                    <label for="path">فایل کتاب</label>

                    <input type="file" class="form-control ml-2"
                           id="path" name="path">
                </div>


                <div class="form-group mt-4">
                    <label for="category_id">نام دسته اصلی</label>
                    <select style="height: 40px" class="form-control" name="category_id" id="category_id">

                        <option value="0">---</option>

                        @foreach($category as $key=>$value)

                            <option value="{{$key}}">{{$value}}</option>

                        @endforeach

                    </select>
                </div>


                <div class="form-group mt-4">

                    <input type="text" class="form-control ml-2" onkeyup="this.value=addCommas(this.value)"
                           id="price" name="price" value="{{old('price')}}"
                           placeholder="قیمت کتاب را وارد نمایید">

                </div>


                <button type="submit" class="btn btn-outline-primary">ارسال</button>

            </div>

        </form>



</div>
@endsection