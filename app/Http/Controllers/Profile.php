<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class Profile extends Controller
{
    public function view($params){
        return view('user.pages.profile',['params'=>$params]);
    }
}
