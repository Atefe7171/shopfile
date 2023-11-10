
@extends('admin.layouts.master')

@section('content')

    <div class="middle">

        <h1 class="text-center title-box my-4">افزودن دسته</h1>


        <form class="text-right mr-5 mb-3" action="{{route('category.update',$category->id)}}"
              method="post">

            <div class="form-control border">

            {{csrf_field()}}
                {{method_field('PATCH')}}
            <input type="text" class="form-control ml-2"
                   id="name" name="name" value="{{$category->name}}"
                   placeholder="نام زیر دسته را وارد نمایید">

            <div class="form-group mt-4">
                <label for="parent_id">نام دسته اصلی</label>
                <select style="height: 40px" class="form-control" name="parent_id" id="parent_id">
                    <option value="{{$category->parent_id}}">{{$category->getParent['name']}}</option>
                    <option value="0">---</option>
                    @foreach($cat as $key=>$value)
                        @if($value != $category->getParent['name'])
                        <option value="{{$key}}">{{$value}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-outline-primary">ارسال</button>
            </div>
        </form>



        <div class="clear"></div>
    </div>


@endsection