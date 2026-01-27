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

    public function showForgotPasswordForm()
{
    return view('auth.forgot-password');
}

    public function ResetPass(Request $request)
    {

        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        // ho provato ad usare il ternario, ma per vedere se ero capace, ogni tanto mi incarto
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'Link inviato!')
            : back()->withErrors(['email' => 'Email non trovata.']);
    }
}
