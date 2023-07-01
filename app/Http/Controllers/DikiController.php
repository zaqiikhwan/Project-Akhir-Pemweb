<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DikiController extends Controller
{
    //
    public function hash()
    {
        $hash_password_saya = Hash::make('123');
        echo $hash_password_saya;
    }
}
