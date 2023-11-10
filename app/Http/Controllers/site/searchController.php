<?php

namespace App\Http\Controllers\site;

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

        $countbasket=Session::get('informationBasket');
        $title = $request->input('search');

        $menu=Category::with('getChild')->
        where('parent_id',0)->get();
        $book=Book::where('title', 'LIKE', '%'.$title.'%')->get();
        $video=Video::where('title', 'LIKE', '%'.$title.'%')->get();

        if(sizeof($book)>0){

            return view('site.resultsearch',compact('menu','book'
                ,'video','countbasket'));

        }else{

            $menu=Category::with('getChild')->
            where('parent_id',0)->get();

            $lastBook=Book::latest()->orderBy('id','DESC')->limit(4)->get();
            $lastVideo=Video::latest()->orderBy('id','DESC')->limit(4)->get();
            $error='اطلاعاتی یافت نشد';

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


            return view('site.index',compact('menu','lastBook'
                ,'lastVideo','error','countbasket',
                'discount1_tedadrooz','discount1_expire','video_discount1','takhfif_final_discount1',
                'discount2_tedadrooz','discount2_expire','video_discount2','takhfif_final_discount2',
                'discount3_tedadrooz','discount3_expire','video_discount3','takhfif_final_discount3',
                'discount4_tedadrooz','discount4_expire','video_discount4','takhfif_final_discount4'
            ));

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
