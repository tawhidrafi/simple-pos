<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function notice()
    {
        return view('auth.verify-email');
    }

    // Handle the email verification
    public function handler(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/')->with('alert', 'Email verified successfully!');
    }

    // Resend verification link
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('alert', 'Verification link sent!');
    }
}
