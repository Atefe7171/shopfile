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

            <form action="{{route('discount.store')}}" method="post">
                {{csrf_field()}}

            <table class="table table-bordered mt-3 list dataTables-example" id="links-table">
                <thead>
                <tr>
                    <th style=" border: 1px solid #1b1e21;">شماره</th>
                    <th style=" border: 1px solid #1b1e21;">نام محصول</th>
                    <th style=" border: 1px solid #1b1e21;">درصد تخفیف</th>
                    <th style=" border: 1px solid #1b1e21;">مهلت به روز</th>
                </tr>
                </thead>
                <tbody>


                @foreach($discount as $val)

                    <input type="hidden" value="{{$val->idre}}" name="id[]">
                <tr>
                    <td style=" border: 1px solid #1b1e21;">{{$val->idre}}</td>

                    <td style=" border: 1px solid #1b1e21;">

                        <div class="form-group mt-4">
                            <select style="height: 40px" class="form-control"
                                    name="video{{$val->id}}" id="video">

                                @foreach($video as $key=>$value)

                                <option value="{{$value->id}}"
                                        @if($value->id==$val->idpro)selected="selected"@endif>
                                    {{$value->title}}</option>

                                    @endforeach

                            </select>
                        </div>

                    </td>

                    <td style=" border: 1px solid #1b1e21;">

                        <div class="form-group mt-4">
                            <input type="text" class="form-control ml-2"
                                   id="darsad" name="darsad{{$val->id}}" value="{{$val->darsad}}"
                                   placeholder="درصد تخفیف">
                        </div>

                    </td>

                    <td style=" border: 1px solid #1b1e21;">

                        <div class="form-group mt-4">
                            <input type="text" class="form-control ml-2"
                                   id="mohlat" name="mohlat{{$val->id}}" value="{{$val->tedadrooz}}"
                                   placeholder="مهلت به روز">
                        </div>

                    </td>

                </tr>
                    @endforeach




                </tbody>
            </table>
            <button type="submit" class="btn btn-outline-primary">ذخیره اطلاعات</button>
            </form>
        </div>

        <div class="clear"></div>
    </div>



@endsection




