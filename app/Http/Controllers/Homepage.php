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

    public function news(Request $request){
        $key = $request->query("key");
        $news = News::where('title', 'LIKE','%'.$key.'%')->paginate(6);
        $cur = $news->currentPage();
        $max = $news->lastPage();

        return view('user.pages.news', 
            ['news'=>$news,
            'cur'=>$cur,
            'max'=>$max]);
    }

    public function newsdetail($id){
        $news = News::find($id);
        $other = News::take(3)->get();

        return view('user.pages.news-detail',
            ["news"=>$news,
            "other"=>$other]);
    }

    
    public function product(){
        return view('user.pages.product');
    }

    public function productdetail($id){
        return view('user.pages.product-detail');
    }

    public function payment($id){
        return view('user.pages.payment');
    }
}
