<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\CategoryVideo;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
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
        $video1=DB::select('select * from videos');
        $video=[];

        foreach ($video1 as $v){

            $id=$v->id;

            $getCategory=DB::select('select * from category_videos WHERE video_id=?',
                array($id));
            $namescat=[];

            foreach ($getCategory as $getcat){

                $idcat=$getcat->category_id;

                $namecat=DB::table('categories')->where('id',$idcat)->first();
                $getNameCategory=$namecat->name;

                array_push($namescat,$getNameCategory);

            }

            $title=$v->title;
            $type =$v->type ;
            $description =$v->description ;
            $image  =$v->image  ;
            $path  =$v->path  ;
            $price =$v->price  ;
            $arr=array('id'=>$id,'title'=>$title,
                'type'=>$type,'description'=>$description,
                'image'=>$image,'path'=>$path,'category'=>$namescat,'price'=>$price);

            array_push($video,$arr);
        }
        return view('admin.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all()->pluck('name','id');
        return view('admin.video.create',compact('category'));
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
            'path' => 'required|mimes:mp4,wmv',
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

        $NameImageVIdeo=$request->file('image')->getClientOriginalName();
        $nameVideo=$request->file('path')->getClientOriginalName();

        $IsEmptyVideoIamge=Video::where('image',$NameImageVIdeo)->pluck('id');
        $IsEmptyVideo=Video::where('path',$nameVideo)->pluck('id');

        if(sizeof($IsEmptyVideoIamge)<1 and sizeof($IsEmptyVideo)<1){


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
                'category_id'=>0,'price'=>$price);
            DB::table('videos')->insert($data);
            $idRecord=DB::getpdo()->lastInsertId();

            foreach ($category_id as $catId){

                $dataCategory=array('category_id'=>$catId,'video_id'=>$idRecord);
                DB::table('category_videos')->insert($dataCategory);

            }

            $result=array();


            $category=Category::all()->pluck('name','id');
            return view('admin.video.create',compact('category','result'));



        }else{

            $result=array('checkdata'=>1);


            $category=Category::all()->pluck('name','id');
            return view('admin.video.create',compact('category','result'));


        }









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

        $video=Video::find($id);

        $getCategory=DB::select('select * from category_videos WHERE video_id=?',
            array($id));
        $namescat=[];

        foreach ($getCategory as $getcat){

            $idcat=$getcat->category_id;

            $namecat=DB::table('categories')->where('id',$idcat)->first();
            $getNameCategory=$namecat->name;

            array_push($namescat,$getNameCategory);

        }

        $category=Category::all()->pluck('name','id');
        return view('admin.video.edit',
            compact('video','namescat','category'));


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

        $file=$request->file('image');
        $file2=$request->file('path');

        $title = $request->input('title');
        $type = $request->input('type');


        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $price = str_replace(',','',$request->input('price'));


        if($request->hasFile('image') and $request->hasFile('path')){


            $imagePathhh = "\upload\images";
            $sourcePathhh = "\upload\path";

            $fileeee= Video::findOrFail($id);
            $img = public_path($imagePathhh . '/' . $fileeee->image);
            $path = public_path($sourcePathhh . '/' . $fileeee->path);

            unlink($img);
            unlink($path);


            if($request->hasFile('image')){

                $this->uploadImge($file);
                $x=$request->file('image')->getClientOriginalName();
            }

            if($request->hasFile('path')){

                $this->uploadSourc($file2);
                $x2=$request->file('path')->getClientOriginalName();
            }

            if(isset($category_id)){
                DB::table('category_videos')->where('video_id',$id)->delete();
                foreach ($category_id as $CatId){
                    $dataCategory=array('category_id'=>$CatId,'video_id'=>$id);
                    DB::table('category_videos')->insert($dataCategory);
                }
            }

            DB::update('update videos set title=?,
type=?,description=?,image=?,path=?,category_id=?,price=? WHERE id=?',
                [$title,$type,$description,$x,$x2,0,$price,$id]);


        }else{


            $namecat=DB::table('videos')->where('id',$id)->first();
            $getNameimageOld=$namecat->image;
            $getNamepathOld=$namecat->path;


            if(isset($category_id)){
                DB::table('category_videos')->where('video_id',$id)->delete();
                foreach ($category_id as $CatId){
                    $dataCategory=array('category_id'=>$CatId,'video_id'=>$id);
                    DB::table('category_videos')->insert($dataCategory);
                }
            }


            DB::update('update videos set title=?,
type=?,description=?,image=?,path=?,category_id=?,price=? WHERE id=?',
                [$title,$type,$description,$getNameimageOld,$getNamepathOld,0,$price,$id]);

        }


        $video1=DB::select('select * from videos');
        $video=[];

        foreach ($video1 as $v){

            $id=$v->id;

            $getCategory=DB::select('select * from category_videos WHERE video_id=?',
                array($id));
            $namescat=[];

            foreach ($getCategory as $getcat){

                $idcat=$getcat->category_id;

                $namecat=DB::table('categories')->where('id',$idcat)->first();
                $getNameCategory=$namecat->name;

                array_push($namescat,$getNameCategory);

            }

            $title=$v->title;
            $type =$v->type ;
            $description =$v->description ;
            $image  =$v->image  ;
            $path  =$v->path  ;
            $price =$v->price  ;
            $arr=array('id'=>$id,'title'=>$title,
                'type'=>$type,'description'=>$description,
                'image'=>$image,'path'=>$path,'category'=>$namescat,'price'=>$price);

            array_push($video,$arr);
        }
        return view('admin.video.index',compact('video'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $searchId= Video::find($id);
        if(!empty($searchId)) {

            $imagePath = "\upload\images";
            $sourcePath = "\upload\path";

            $file = Video::findOrFail($id);
            $img = public_path($imagePath . '/' . $file->image);
            $path = public_path($sourcePath . '/' . $file->path);

            unlink($img);
            unlink($path);

            DB::table('category_videos')->where('video_id',$id)->delete();
            Video::find($id)->delete();

        }

        $video1=DB::select('select * from videos');
        $video=[];

        foreach ($video1 as $v){

            $id=$v->id;

            $getCategory=DB::select('select * from category_videos WHERE video_id=?',
                array($id));
            $namescat=[];

            foreach ($getCategory as $getcat){

                $idcat=$getcat->category_id;

                $namecat=DB::table('categories')->where('id',$idcat)->first();
                $getNameCategory=$namecat->name;

                array_push($namescat,$getNameCategory);

            }

            $title=$v->title;
            $type =$v->type ;
            $description =$v->description ;
            $image  =$v->image  ;
            $path  =$v->path  ;
            $price =$v->price  ;
            $arr=array('id'=>$id,'title'=>$title,
                'type'=>$type,'description'=>$description,
                'image'=>$image,'path'=>$path,'category'=>$namescat,'price'=>$price);

            array_push($video,$arr);
        }
        return view('admin.video.index',compact('video'));



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
