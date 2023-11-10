<?php

namespace App\Http\Controllers\site;

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class siteController extends Controller
{

    public function index()
    {

        $cookie=self::cookieBasket();

        $informationbasket=DB::table('baskets')->
        where('cookie','=',$cookie)->get();
        $countbasket=$informationbasket->count();
        Session::start();
        Session::put('informationBasket',$countbasket);
        Session::put('cookiebasket',$cookie);

        $menu=Category::with('getChild')->
        where('parent_id',0)->get();

        $lastBook=Book::latest()->orderBy('id','DESC')->limit(4)->get();
        $lastVideo=Video::latest()->orderBy('id','DESC')->limit(4)->get();

        //Start_iscount1

        $discout1=DB::table('discounts')->where('idre',1)->first();
        $discount1_idpro=$discout1->idpro;
        $discount1_darsad=$discout1->darsad;
        $discount1_tedadrooz=$discout1->tedadrooz;
        $discount1_expire=$discout1->expire;

        $video_discount1=DB::table('videos')->
        where('id',$discount1_idpro)->first();

        $amount_discount1=$video_discount1->price;
        $takhfif=$amount_discount1*$discount1_darsad/100;
        $takhfif_final_discount1=$amount_discount1-$takhfif;
        //End_iscount1



        //Start_iscount2

        $discout2=DB::table('discounts')->where('idre',2)->first();
        $discount2_idpro=$discout2->idpro;
        $discount2_darsad=$discout2->darsad;
        $discount2_tedadrooz=$discout2->tedadrooz;
        $discount2_expire=$discout2->expire;

        $video_discount2=DB::table('videos')->
        where('id',$discount2_idpro)->first();

        $amount_discount2=$video_discount2->price;
        $takhfif=$amount_discount2*$discount2_darsad/100;
        $takhfif_final_discount2=$amount_discount2-$takhfif;
        //End_iscount2

        //Start_iscount3

        $discout3=DB::table('discounts')->where('idre',3)->first();
        $discount3_idpro=$discout3->idpro;
        $discount3_darsad=$discout3->darsad;
        $discount3_tedadrooz=$discout3->tedadrooz;
        $discount3_expire=$discout3->expire;

        $video_discount3=DB::table('videos')->
        where('id',$discount3_idpro)->first();

        $amount_discount3=$video_discount3->price;
        $takhfif=$amount_discount3*$discount3_darsad/100;
        $takhfif_final_discount3=$amount_discount3-$takhfif;
        //End_iscount3


        //Start_iscount4

        $discout4=DB::table('discounts')->where('idre',4)->first();
        $discount4_idpro=$discout4->idpro;
        $discount4_darsad=$discout4->darsad;
        $discount4_tedadrooz=$discout4->tedadrooz;
        $discount4_expire=$discout4->expire;

        $video_discount4=DB::table('videos')->
        where('id',$discount4_idpro)->first();

        $amount_discount4=$video_discount4->price;
        $takhfif=$amount_discount4*$discount4_darsad/100;
        $takhfif_final_discount4=$amount_discount4-$takhfif;
        //End_iscount4



        return view('site.index',compact('menu','lastBook','lastVideo',
            'discount1_tedadrooz','discount1_expire','video_discount1','takhfif_final_discount1',
            'discount2_tedadrooz','discount2_expire','video_discount2','takhfif_final_discount2',
            'discount3_tedadrooz','discount3_expire','video_discount3','takhfif_final_discount3',
            'discount4_tedadrooz','discount4_expire','video_discount4','takhfif_final_discount4',
            'countbasket'));

    }

    public function menu($id)
    {

        $cookie=self::cookieBasket();
        $informationbasket=DB::table('baskets')->
        where('cookie','=',$cookie)->get();
        $countbasket=$informationbasket->count();

        $menu=Category::with('getChild')->
        where('parent_id',0)->get();
        $namemenu=Category::find($id);

        $parentId=DB::table('categories')->where('id',$id)->first();
        $parent_id=$parentId->parent_id;
        if($parent_id==0){

            $nameMainMenuTest=array();
        }else{

            $nameMainMenu=DB::table('categories')->where('id',$parent_id)->first();
            $nameMainMenuTest=array(1,1);

        }



        $book=DB::table('books')->
        where('category_id',$id)->orderBy('id','desc')->get();


        $category_videos=DB::table('category_videos')->
        where('category_id',$id)->orderBy('id','desc')->get();

        $array=array();
        foreach ($category_videos as $key=>$value){
            $array[$key]=$value->video_id;
        }

        $video=DB::table('videos')->
        whereIn('id',$array)->orderBy('id','desc')->get();




        return view('site.menubook',compact('menu',
            'namemenu','book','nameMainMenu','nameMainMenuTest','video','countbasket'));
    }

    function BookSingleControll($id){

        $cookie=self::cookieBasket();

        $informationbasket=DB::table('baskets')->
        where('cookie','=',$cookie)->get();
        $countbasket=$informationbasket->count();

        $menu=Category::with('getChild')->
        where('parent_id',0)->get();


        $book=DB::table('books')->
        where('id',$id)->first();

        return view('site.BookSingleview',compact('menu','book',
            'countbasket'));

    }

    function VideoSingleControll($id){

        $cookie=self::cookieBasket();

        $informationbasket=DB::table('baskets')->
        where('cookie','=',$cookie)->get();
        $countbasket=$informationbasket->count();

        $menu=Category::with('getChild')->
        where('parent_id',0)->get();


        $video=DB::table('videos')->
        where('id',$id)->first();



        return view('site.videoSingleview',compact('menu','video','countbasket'));


    }

    function VideoSingleDisCount($id){

        $cookie=self::cookieBasket();

        $informationbasket=DB::table('baskets')->
        where('cookie','=',$cookie)->get();
        $countbasket=$informationbasket->count();

        $menu=Category::with('getChild')->
        where('parent_id',0)->get();


        $discout1=DB::table('discounts')->where('idre',$id)->first();
        $discount1_idpro=$discout1->idpro;
        $discount1_darsad=$discout1->darsad;
        $discount1_tedadrooz=$discout1->tedadrooz;
        $discount1_expire=$discout1->expire;

        $video_discount1=DB::table('videos')->
        where('id',$discount1_idpro)->first();

        $amount_discount1=$video_discount1->price;
        $takhfif=$amount_discount1*$discount1_darsad/100;
        $takhfif_final_discount1=$amount_discount1-$takhfif;

        $idrecord=$id;



        return view('site.videoSingledisCount',compact('menu',
            'discount1_tedadrooz','discount1_expire','video_discount1',
            'takhfif_final_discount1','idrecord','countbasket'));


    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public static function cookieBasket()
    {

        if(isset($_COOKIE['Basketookie'])){

            $cookie=$_COOKIE['Basketookie'];

        }else{

            $expire=time()+4*24*3600;
            $value=time();
            setcookie('Basketookie',$value,$expire,'/');
            $cookie=$value;
        }

        return $cookie;

    }

}
