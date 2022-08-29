<?php

namespace App\Http\Controllers\Api;

use App\Actions\newsActions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newsController extends Controller
{
    public function getNews(newsActions $actions){

        $get_news = $actions->news();
        return response()->json($get_news);
    }

    public function newsDetails (newsActions $actions ,$id){
        $details = $actions->news_details($id);
        return response()->json($details);
    }
}
