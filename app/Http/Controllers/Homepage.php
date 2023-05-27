<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homepage extends Controller
{
    public function home(){
        return view('user.pages.home');
    }

    public function profile($params){
        return view('user.pages.profile',['params'=>$params]);
    }
}
