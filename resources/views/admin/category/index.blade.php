@extends('admin.layouts.master')

@section('content')


    <script src="{{url('scdelete/jquery-3.0.0.min.js')}}"></script>
    <script src="{{url('scdelete/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('scdelete/custom.js')}}"></script>

    <div class="middle">

        <div class="container">

            @isset($result)

                @if(sizeof($result)>0)

                    <span style="background-color: red; color: white; padding: 2px;
            text-align: center; font-size: 12pt; margin-top: 10px">
                 به دلیل اینکه این دسته
                دارای کتاب یا ویدئو است لذا حذف آن امکان پذیر نمی باشد
            </span>

                    @endif
            @endisset



            <table class="table table-bordered mt-3" id="links-table">
                <thead>
                <tr>
                    <th style=" border: 1px solid #1b1e21;">ردیف</th>
                    <th style=" border: 1px solid #1b1e21;">نام دسته</th>
                    <th style=" border: 1px solid #1b1e21;">دسته اصلی</th>
                    <th style=" border: 1px solid #1b1e21;">ویرایش</th>
                    <th style=" border: 1px solid #1b1e21;">حذف</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=1; ?>

                @foreach($category as $cat)
                <tr>
                    <td style=" border: 1px solid #1b1e21;">{{$i++}}</td>
                    <td style=" border: 1px solid #1b1e21;">{{$cat->name}}</td>
                    <td style=" border: 1px solid #1b1e21;">{{$cat->getParent['name']}}</td>
                    <td style=" border: 1px solid #1b1e21;"><button class="btn btn-primary">
                            <a style="color: black"  href="{{route('category.edit',$cat->id)}}">ویراش</a>
                        </button></td>
                    <td style=" border: 1px solid #1b1e21;">
                        <form method="post" action="{{route('category.destroy',$cat->id)}}">

                            {{method_field('delete')}}
                            {{csrf_field()}}

                            <button style="cursor: pointer" type="submit"
                                    class="btn btn-danger delete-link">حذف</button>
                        </form>

                    </td>
                </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="clear"></div>
    </div>

@endsection