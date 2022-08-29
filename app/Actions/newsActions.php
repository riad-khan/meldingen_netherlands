<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class newsActions
{
    public function news(){
        $get_news = DB::table('nieuws')
            ->join('regio','nieuws.regio','=','regio.id')
            ->join('provincie','provincie.id','=','nieuws.provincie')
            ->join('stad','stad.id','=','nieuws.stad')
            ->select('provincie.provincie_url','stad.*','regio.regio','regio.regio_url','nieuws.title','nieuws.title_url','nieuws.intro'
                ,'nieuws.story','nieuws.media','nieuws.source','nieuws.timestamp')
            ->get();

        return $get_news ;
    }
    public function news_details ($id){
        $news_details = DB::table('nieuws')
            ->join('regio','nieuws.regio','=','regio.id')
            ->join('provincie','provincie.id','=','nieuws.provincie')
            ->join('stad','stad.id','=','nieuws.stad')
            ->select('provincie.provincie_url','stad.*','regio.regio','regio.regio_url','nieuws.title','nieuws.title_url','nieuws.intro'
                ,'nieuws.story','nieuws.media','nieuws.source','nieuws.timestamp')
            ->where('nieuws.id','=',$id)
            ->get();

        return $news_details ;
    }
}
