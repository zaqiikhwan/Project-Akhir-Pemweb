<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::attempt($data)){
            return redirect('home');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout(){
        Auth::logout();
        return redirect('/');
    }
}
