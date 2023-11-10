<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanerController extends Controller
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
        return view('admin.baner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.baner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),[
            'baner1' => 'required|mimes:jpeg,png,bmp',
            'baner2' => 'required|mimes:jpeg,png,bmp',
        ]);


        $file=$request->file('baner1');
        $file2=$request->file('baner2');




        if($request->hasFile('baner1')){

            $this->baner1($file);
        }

        if($request->hasFile('baner2')){

            $this->baner2($file2);
        }

        return view('admin.baner.create');

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

    private function baner1($file)
    {
        $imagePath = "\baner";
        $filename ='baner1.jpg';
        $file->move(public_path($imagePath),$filename);

    }

    private function baner2($file2)
    {

        $sourcePath = "\baner";
        $filename1 = 'baner2.jpg';
        $file2->move(public_path($sourcePath),$filename1);

    }

}
