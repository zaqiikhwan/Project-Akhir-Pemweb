<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class Homepage extends Controller
{
    public function home(){
        return view('user.pages.home');
    }

    public function profile($params){
        return view('user.pages.profile',['params'=>$params]);
    }

    public function news(){
        $news = News::paginate(9);       
        $cur = $news->currentPage();
        $max = $news->lastPage();
        return view('user.pages.news', 
            ['news'=>$news,
            'cur'=>$cur,
            'max'=>$max]);
    }
}
