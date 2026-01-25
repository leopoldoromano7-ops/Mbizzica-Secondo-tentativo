<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    
    public function home()
    {
        // dd(Auth::check());
        return view('welcome');
    }

        public function confirmedTwoFactorAuthentication()
    {
        // dd(Auth::check());
        return view('two-factor-challenge');
    }


}
