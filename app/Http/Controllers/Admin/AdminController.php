<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function index()
    {

        //ta1

        $date=date('Y/m/d');
        @$dateShamsi1=self::MiladiTojalili($date);

        $jam1_1=array();
        $information1=DB::
        select('select taikh,sum(amount) as totalfi from purchases 
GROUP BY taikh HAVING taikh=?',array($dateShamsi1));


        foreach ($information1 as $infor){
            $jam1=$infor->totalfi;
            array_push($jam1_1,$jam1);
        }

        $jamkol_1=$jam1_1[0];

        //ta2

        $tarikh2=date('Y/m/d',strtotime('-1 days'));
        $tarikh2_shamsi=self::MiladiTojalili($tarikh2);

        $jam1_2=array();

        $information2=DB::
        select('select taikh,sum(amount) as totalfi from purchases 
GROUP BY taikh HAVING taikh=?',array($tarikh2_shamsi));

        foreach ($information2 as $infor2){

            $jam2=$infor2->totalfi;
            array_push($jam1_2,$jam2);
        }
        @$jamkol_2=$jam1_2[0];

        //ta3


        $tarikh3=date('Y/m/d',strtotime('-2 days'));
        $tarikh3_shamsi=self::MiladiTojalili($tarikh3);

        $jam1_3=array();

        $information3=DB::
        select('select taikh,sum(amount) as totalfi from purchases 
GROUP BY taikh HAVING taikh=?',array($tarikh3_shamsi));

        foreach ($information3 as $infor3){

            $jam3=$infor3->totalfi;
            array_push($jam1_3,$jam3);
        }
        @$jamkol_3=$jam1_3[0];

        //ta4


        $tarikh4=date('Y/m/d',strtotime('-3 days'));
        $tarikh4_shamsi=self::MiladiTojalili($tarikh4);

        $jam1_4=array();

        $information4=DB::
        select('select taikh,sum(amount) as totalfi from purchases 
GROUP BY taikh HAVING taikh=?',array($tarikh4_shamsi));

        foreach ($information4 as $infor4){

            $jam4=$infor4->totalfi;
            array_push($jam1_4,$jam4);
        }
        @$jamkol_4=$jam1_4[0];





        return view('admin.index',compact('dateShamsi1','jamkol_1'
            ,'tarikh2_shamsi','jamkol_2','tarikh3_shamsi','jamkol_3',
            'tarikh4_shamsi','jamkol_4'));

    }


    public static function MiladiTojalili($miladi,$format='/') {

        $miladi=explode('/',$miladi);
        $year=$miladi[0];
        $month=$miladi[1];
        $day=$miladi[2];
        $date=self::gregorian_to_jalali($year,$month,$day);
        $date=implode($format,$date);
        return $date;
    }

    public static function tr_num($str,$mod='en',$mf='٫'){
        $num_a=array('0','1','2','3','4','5','6','7','8','9','.');
        $key_a=array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹',$mf);
        return($mod=='fa')?str_replace($num_a,$key_a,$str):str_replace($key_a,$num_a,$str);
    }


    public static function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
        list($gy,$gm,$gd)=explode('_',self::tr_num($gy.'_'.$gm.'_'.$gd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
        $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
        $jy=($gy<=1600)?0:979;
        $gy-=($gy<=1600)?621:1600;
        $gy2=($gm>2)?($gy+1):$gy;
        $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100))
            +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
        $jy+=33*((int)($days/12053));
        $days%=12053;
        $jy+=4*((int)($days/1461));
        $days%=1461;
        $jy+=(int)(($days-1)/365);
        if($days > 365)$days=($days-1)%365;
        $jm=($days < 186)?1+(int)($days/31):7+(int)(($days-186)/30);
        $jd=1+(($days < 186)?($days%31):(($days-186)%30));
        return($mod=='')?array($jy,$jm,$jd):$jy.$mod.$jm.$mod.$jd;
    }
}
