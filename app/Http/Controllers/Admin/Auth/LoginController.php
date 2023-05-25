<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LoginController extends Controller
{

    // use AuthenticateUsers;

    protected $guard = 'adminMiddle';
    protected $redirectTo = 'admin/home';

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function guard(){
        return auth()->guard('adminMiddle');
    }

    public function loginForm(){
        if(auth()->guard('adminMiddle')->user()){
            return back();
        }
        return view('login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(auth()->guard('adminMiddle')->attempt(['email' => $request->email, 'password' => $request->password])){
            $admin = auth()->guard('adminMiddle')->user();
            Session::put('success', 'Anda berhasil login!');
            return redirect()->route('admin.home');
        } else {
            return back()->with('error', 'email atau password salah!');
        }
    }

    // public function index(){
    //     return view('login', [
    //         'title' => 'Login',
    //         'active' => 'login'
    //     ]);
    // }

    // public function authenticate(Request $request){
    //     $request->validate([
    //         'email' => 'required|email:dns',
    //         'password' => 'required'
    //     ]);

    //     dd('berhasil login');
    // }
    //
}
