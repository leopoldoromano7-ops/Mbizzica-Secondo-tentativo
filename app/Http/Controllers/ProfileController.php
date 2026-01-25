<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ProfileController extends Controller
{
       
        public function twoFactor()
    {
        return view('settings.two-factor');
    }

    public function ResetPass(Request $request){
    
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
            $request->only('email')
        );

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', 'Link inviato!')
        : back()->withErrors(['email' => 'Email non trovata.']);
    }
}
// USIAMO Il ternario giusto per far vedere eh