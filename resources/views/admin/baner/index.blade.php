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


            <table class="table table-bordered mt-3 list dataTables-example" id="links-table">
                <thead>
                <tr>
                    <th style=" border: 1px solid #1b1e21;">ردیف</th>
                    <th style=" border: 1px solid #1b1e21;">تصویر 1</th>
                    <th style=" border: 1px solid #1b1e21;">تصویر 2</th>
                </tr>
                </thead>
                <tbody>


                <?php $i=1; ?>
                <tr>
                    <td style=" border: 1px solid #1b1e21;">{{$i++}}</td>

                    <td style=" border: 1px solid #1b1e21;">
                        <img src="{{url('baner/baner1.jpg')}}" height="60" width="130">
                    </td>

                    <td style=" border: 1px solid #1b1e21;">
                        <img src="{{url('baner/baner2.jpg')}}" height="60" width="130">
                    </td>



                </tr>




                </tbody>
            </table>
        </div>

        <div class="clear"></div>
    </div>



@endsection




