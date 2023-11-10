@extends('admin.layouts.master')

@section('content')

    <script src="{{url('scdelete/jquery-3.0.0.min.js')}}"></script>
    <script src="{{url('scdelete/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('scdelete/custom.js')}}"></script>



    <div class="middle">

        <div class="container">


            <style>


                table{
                    width: 80%;
                    padding-right: 5px;
                    padding-left: 5px;
                    padding-bottom: 2px;
                    margin-bottom: 5px;
                    text-align: center;
                    box-shadow: 8px 8px 8px #ccc;

                }

                table.list tr:nth-child(even) {
                    background: #f4fcff;

                }

                table th{

                    padding: 5px;

                    background-color: #d7d7d7;

                    text-align: center;
                }

                table td{

                    padding: 5px;

                }




                table.active tr:first-child td:first-child{
                    background: #f7fff7;

                }






            </style>


            <table class="table table-bordered mt-3 dataTables-example" id="links-table">
                <thead>
                <tr>
                    <th style=" border: 1px solid #1b1e21;">ردیف</th>
                    <th style=" border: 1px solid #1b1e21;">عنوان ویدئو</th>
                    <th style=" border: 1px solid #1b1e21;">نوع ویدئو</th>
                    <th style=" border: 1px solid #1b1e21;">توضیحات</th>
                    <th style=" border: 1px solid #1b1e21;">تصویر ویدئو</th>
                    <th style=" border: 1px solid #1b1e21;">دانلود ویدئو</th>
                    <th style=" border: 1px solid #1b1e21;">دسته بندی</th>
                    <th style=" border: 1px solid #1b1e21;">قیمت ویدئو</th>
                    <th style=" border: 1px solid #1b1e21;">ویرایش</th>
                    <th style=" border: 1px solid #1b1e21;">حذف</th>
                </tr>
                </thead>
                <tbody>



                @if(empty($video))



                        <tr >
                            <td style=" border: 1px solid #1b1e21;" class="text-center" colspan="10">
                                اطلاعاتی برای نمایش وجود ندارد</td>
                        </tr>

                        @endif





                <?php $i=1; ?>

              @foreach($video as $video)
                    <tr>
                        <td style=" border: 1px solid #1b1e21;">{{$i++}}</td>
                        <td style=" border: 1px solid #1b1e21;">{{$video['title']}}</td>
                        <td style=" border: 1px solid #1b1e21;">

                            <?php
                            if($video['type']==0)

                                echo "نقدی";

                            else

                                echo "رایگان";
                            $yummy   = ["<p>", "</p>", "php"];
                            ?>

                        </td>

                        <td style=" border: 1px solid #1b1e21;">{{str_replace($yummy ,'',$video['description']) }}

                        </td>

                        <td style=" border: 1px solid #1b1e21;">
                            <img src="{{url('upload/images').'/'.$video['image']}}" height="60" width="90">
                        </td>

                        <td style=" border: 1px solid #1b1e21;"><a download href="{{url('upload/path').'/'.$video['path']}}">
                                {{$video['path']}}
                            </a></td>

                        <td style=" border: 1px solid #1b1e21;">{{join(',',$video['category'])}}</td>
                        <td style=" border: 1px solid #1b1e21;">

                            {{number_format($video['price'])}}

                            تومان</td>
                        <td style=" border: 1px solid #1b1e21;">

                            <button class="btn btn-primary">
                                <a style="color: black"  href="{{route('video.edit',$video['id'])}}">ویراش</a>
                            </button>


                        </td>
                        <td  style=" border: 1px solid #1b1e21;">

                            <form action="{{route('video.destroy',$video['id'])}}"
                                  method="post">
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

@section('scripts')


    <script src="{{url('datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('datatables/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons" B>lTfgitp',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    'colvis'
                ]
            });
        });
    </script>


@endsection
