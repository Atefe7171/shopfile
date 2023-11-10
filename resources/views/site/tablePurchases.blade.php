
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

            <table class="table table-bordered mt-3 dataTables-example" id="links-table">



                <thead>
                <tr >
                    <td style=" border: 1px solid #1b1e21;" class="text-center" colspan="8">
                        <strong>خرید های من</strong></td>
                </tr>
                <tr>
                    <th style=" border: 1px solid #1b1e21;">ردیف</th>
                    <th style=" border: 1px solid #1b1e21;">موضوع محصول</th>
                    <th style=" border: 1px solid #1b1e21;">عنوان محصول</th>
                    <th style=" border: 1px solid #1b1e21;">تصویر محصول</th>
                    <th style=" border: 1px solid #1b1e21;">قیمت</th>
                    <th style=" border: 1px solid #1b1e21;">لینک دانلود</th>
                    <th style=" border: 1px solid #1b1e21;">تاریخ خرید</th>
                    <th style=" border: 1px solid #1b1e21;">کد تراکنش</th>
                </tr>
                </thead>
                <tbody>



                @if(empty($PurchasesArray))



                    <tr >
                        <td style=" border: 1px solid #1b1e21;" class="text-center" colspan="8">
                            اطلاعاتی برای نمایش وجود ندارد</td>
                    </tr>

                @endif





                <?php $i=1; ?>

                @foreach($PurchasesArray as $purchases)
                    <tr>
                        <td style=" border: 1px solid #1b1e21;">{{$i++}}</td>
                        <td style=" border: 1px solid #1b1e21;">{{$purchases['type']}}</td>
                        <td style=" border: 1px solid #1b1e21;">{{$purchases['title']}}</td>

                        <td style=" border: 1px solid #1b1e21;">
                            <img src="{{url('upload/images').'/'.$purchases['image']}}" height="60" width="90">
                        </td>


                        <td style=" border: 1px solid #1b1e21;">

                            {{number_format($purchases['amount'])}}

                            تومان</td>
                        <td  style=" border: 1px solid #1b1e21;">

                            <a download href="{{url('upload/path').'/'.$purchases['path']}}">
                                {{$purchases['path']}}
                            </a>


                        </td>

                        <td style=" border: 1px solid #1b1e21;">{{$purchases['taikh']}}</td>
                        <td style=" border: 1px solid #1b1e21;">
                            {{$purchases['RefID']}}</td>

                    </tr>
                @endforeach



                </tbody>
            </table>



        </div>
    </div>



@endsection
