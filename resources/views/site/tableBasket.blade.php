
@extends('site.layouts.master')




@section('VideoNew')

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


    <div class="row mt-3 mb-3">
        <div class="card" style="width: 700px !important;margin: auto">




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

<span style="color: red; text-align: center">{{@$error2}}</span>
            <table class="table table-bordered mt-3 dataTables-example" id="links-table">



                <thead>
                <tr >
                    <td style=" border: 1px solid #1b1e21;" class="text-center" colspan="6">
                        <strong>سبد خرید شما</strong></td>
                </tr>
                <tr>
                    <th style=" border: 1px solid #1b1e21;">ردیف</th>
                    <th style=" border: 1px solid #1b1e21;">موضوع محصول</th>
                    <th style=" border: 1px solid #1b1e21;">عنوان محصول</th>
                    <th style=" border: 1px solid #1b1e21;">تصویر محصول</th>
                    <th style=" border: 1px solid #1b1e21;">قیمت</th>
                    <th style=" border: 1px solid #1b1e21;">حذف</th>
                </tr>
                </thead>
                <tbody>



                @if(empty($BasketArray))



                    <tr >
                        <td style=" border: 1px solid #1b1e21;" class="text-center" colspan="6">
                            اطلاعاتی برای نمایش وجود ندارد</td>
                    </tr>

                @endif





                <?php $i=1; ?>

                @foreach($BasketArray as $Basket)
                    <tr>
                        <td style=" border: 1px solid #1b1e21;">{{$i++}}</td>
                        <td style=" border: 1px solid #1b1e21;">{{$Basket['type']}}</td>
                        <td style=" border: 1px solid #1b1e21;">{{$Basket['title']}}</td>

                        <td style=" border: 1px solid #1b1e21;">
                            <img src="{{url('upload/images').'/'.$Basket['image']}}" height="60" width="90">
                        </td>


                        <td style=" border: 1px solid #1b1e21;">

                            {{number_format($Basket['amount'])}}

                            تومان</td>
                        <td  style=" border: 1px solid #1b1e21;">

                            <form action="{{route('tablebasket.destroy',$Basket['iddelete'])}}"
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
            <button style="cursor: pointer" type="submit"
                    class="btn btn-info delete-link">
                <a style="text-decoration: none;
                outline: none;color: black" href="{{route('tablebasket.create')}}">پرداخت آنلاین</a></button>



        </div>
    </div>



@endsection
