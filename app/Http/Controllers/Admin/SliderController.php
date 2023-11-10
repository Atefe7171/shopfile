<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'slide1' => 'required|mimes:jpeg,png,bmp',
            'slide2' => 'required|mimes:jpeg,png,bmp',
            'slide3' => 'required|mimes:jpeg,png,bmp',
        ]);


        $file=$request->file('slide1');
        $file2=$request->file('slide2');
        $file3=$request->file('slide3');





        if($request->hasFile('slide1')){

            $this->slider1($file);
        }

        if($request->hasFile('slide2')){

            $this->slider2($file2);
        }
        if($request->hasFile('slide3')){

            $this->slider3($file3);
        }

        return view('admin.slider.create');

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

    private function slider1($file)
    {
        $imagePath = "\slider";
        $filename ='slider1.jpg';
        $file->move(public_path($imagePath),$filename);

    }

    private function slider2($file2)
    {

        $sourcePath = "\slider";
        $filename1 = 'slider2.jpg';
        $file2->move(public_path($sourcePath),$filename1);

    }

    private function slider3($file3)
    {

        $sourcePath = "\slider";
        $filename3 = 'slider3.jpg';
        $file3->move(public_path($sourcePath),$filename3);

    }
}
