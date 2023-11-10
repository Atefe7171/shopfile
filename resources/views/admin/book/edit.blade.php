@extends('admin.layouts.master')

@section('content')


    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <div class="middle">

        <h1 class="text-center title-box my-4">ویرایش کتاب</h1>


        <form action="{{route('book.update',$book->id)}}" method="post"
              enctype="multipart/form-data" class="text-right mr-5 mb-3">
            <div class="form-control border" style="width: 800px">

                {{csrf_field()}}
                {{method_field('PATCH')}}

                @include('admin.section.errors')

                <div class="form-group mt-4">
                    <input type="text" class="form-control ml-2"
                           id="title" name="title" value="{{$book->title}}"
                           placeholder="عنوان کتاب را وارد نمایید">
                </div>

                <div class="form-group mt-4">
                    <label for="type">نوع کتاب</label>
                    <select style="height: 40px" class="form-control" name="type" id="type">

                        <option value="1" {{$book->type=='1' ? 'selected' : ''}}>
                            رایگان
                        </option>

                        <option value="0" {{$book->type=='0' ? 'selected' : ''}}>

                            نقدی
                        </option>

                    </select>
                </div>


                <div class="form-group mt-4">
                    <textarea name="description" id="description" placeholder="توضیحات کتاب را وارد نمایید"
                              cols="30" rows="5" class="form-control">

                        {{$book->description}}
                    </textarea>
                </div>


                <script>

                    CKEDITOR.replace('description',{});
                </script>




                <div class="form-group mt-4">
                    <label for="image">عکس کتاب</label>

                    <input type="file" class="form-control ml-2"
                           id="image" name="image">

                    <input src="{{url('upload/images').'/'.$book->image}}" type="image" id="image" width="100" height="80">
                </div>

                <div class="form-group mt-4">
                    <label for="path">فایل کتاب</label>

                    <input type="file" class="form-control ml-2"
                           id="path" name="path">

                    <div>{{$book->path}}</div>
                </div>


                <div class="form-group mt-4">
                    <label for="category_id">نام دسته اصلی</label>
                    <select style="height: 40px" class="form-control" name="category_id" id="category_id">

                        <option value="0">---</option>

                        @foreach($cat as $key=>$value)

                            <option value="{{$key}}"
                                    @if($value==$book->category['name'])selected="selected"@endif>
                                {{$value}}</option>


                        @endforeach

                    </select>
                </div>


                <div class="form-group mt-4">

                    <input type="text" class="form-control ml-2"
                           id="price" name="price" value="{{number_format($book->price)}}"
                           placeholder="قیمت کتاب را وارد نمایید">

                </div>


                <button type="submit" class="btn btn-outline-primary">ارسال</button>

            </div>

        </form>



    </div>
@endsection