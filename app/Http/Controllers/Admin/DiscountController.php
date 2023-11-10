<?php

namespace App\Http\Controllers\Admin;


use App\Models\Discount;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{

    function __construct()
    {
        $this->middleware('isadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $video=Video::all();
        $discount=Discount::all();
        return view('admin.discount.index',compact('video','discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ids=$request->input('id');

        foreach ($ids as $id){


            $param=array($request->input('video'.$id)
            ,$request->input('darsad'.$id)
            ,$request->input('mohlat'.$id)
            ,time(),$id);

            DB::update('update discounts set 
idpro=?,darsad=?,tedadrooz=?,expire=? WHERE idre=?',$param);


        }

        $video=Video::all();
        $discount=Discount::all();
        return view('admin.discount.index',compact('video','discount'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }



}
