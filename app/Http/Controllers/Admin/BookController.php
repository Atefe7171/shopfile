<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
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
        $book=Book::all();
        return view('admin.book.index',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all()->pluck('name','id');
        return view('admin.book.create',compact('category'));
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
            'title' => 'required|max:250',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,bmp',
            'path' => 'required|mimes:txt,doc,pdf',
            'category_id' => 'required',
            'price' => 'required',
        ]);


        $file=$request->file('image');
        $file2=$request->file('path');

        $title = $request->input('title');
        $type = $request->input('type');


        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $price1 = $request->input('price');
        $price = str_replace(',','',$price1);




        if($request->hasFile('image')){

            $this->uploadImge($file);
            $x=$request->file('image')->getClientOriginalName();
        }

        if($request->hasFile('path')){

            $this->uploadSourc($file2);
            $x2=$request->file('path')->getClientOriginalName();
        }



//        Book::create($request->all());

        $data=array('title'=>$title,"image"=>$x,'type'=>$type,
            'description'=>$description,'path'=>$x2,
            'category_id'=>$category_id,'price'=>$price);


        DB::table('books')->insert($data);


        $category=Category::all()->pluck('name','id');
        return view('admin.book.create',compact('category'));

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
        $book=Book::find($id);
        $cat=Category::where('parent_id',0)->pluck('name','id');

        return view('admin.book.edit',compact('book','cat'));
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
        $this->validate(request(),[
            'title' => 'required|max:250',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,bmp',
            'path' => 'required|mimes:txt,doc,pdf',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        $file=$request->file('image');
        $file2=$request->file('path');

        $title = $request->input('title');
        $type = $request->input('type');


        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $price = str_replace(',','',$request->input('price'));




        if($request->hasFile('image')){

            $this->uploadImge($file);
            $x=$request->file('image')->getClientOriginalName();
        }

        if($request->hasFile('path')){

            $this->uploadSourc($file2);
            $x2=$request->file('path')->getClientOriginalName();
        }



        DB::update('update books set title=?,
type=?,description=?,image=?,path=?,category_id=?,price=? WHERE id=?',
            [$title,$type,$description,$x,$x2,$category_id,$price,$id]);


        $book=Book::all();
        return view('admin.book.index',compact('book'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $searchId= Book::find($id);
        if(!empty($searchId)){

            $imagePath = "\upload\images";
            $sourcePath = "\upload\path";

            $file=Book::findOrFail($id);
            $img=public_path($imagePath.'/'.$file->image);
            $path=public_path($sourcePath.'/'.$file->path);

            unlink($img);
            unlink($path);

            Book::find($id)->delete();


        }

        $book=Book::all();
        return view('admin.book.index',compact('book'));

    }

    private function uploadImge($file)
    {
        $imagePath = "\upload\images";
        $filename =$file->getClientOriginalName();
        $file->move(public_path($imagePath),$filename);

    }

    private function uploadSourc($file2)
    {

        $sourcePath = "\upload\path";
        $filename1 = $file2->getClientOriginalName();
        $file2->move(public_path($sourcePath),$filename1);

    }
}
