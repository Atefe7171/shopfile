<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use App\Models\CategoryVideo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::where('parent_id','0')->pluck('name','id');
        return view('admin.category.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->all());


        $category=Category::all();
        return view('admin.category.index',compact('category'));

//        return redirect('admin/category');


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

        $category=Category::find($id);
        $cat=Category::where('parent_id','0')->pluck('name','id');
        return view('admin.category.edit',compact('category','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryUpdate=Category::findOrfail($id);
        $categoryUpdate->update($request->all());

        $category=Category::all();
        return view('admin.category.index',compact('category'));

//        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $searchId=Category::find($id);
        $isEmptyBook=Book::where('category_id',$id)->pluck('id');
        $isEmptyVideo=CategoryVideo::where('category_id',$id)->pluck('id');

        if(sizeof($isEmptyBook)<1 and sizeof($isEmptyVideo)<1){

            if(!empty($searchId)){

                Category::where('parent_id',$id)->delete();
                Category::find($id)->delete();
            }
            $result=array();

            $category=Category::all();
            return view('admin.category.index',compact('category','result'));

        }else{

            $result=array('checkdata'=>1);

            $category=Category::all();
            return view('admin.category.index',compact('category','result'));

        }

//        return redirect('admin/category');
    }
}
