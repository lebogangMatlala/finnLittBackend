<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        // $request->validate(['email' => 'required|email']);

        // $response = Password::sendResetLink($request->only('email'));

        // return $response === Password::RESET_LINK_SENT
        //     ? response()->json(['message' => 'Reset link sent to your email.'], 200)
        //     : response()->json(['message' => 'Unable to send reset link'], 400);

        $request->validate(['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Password reset link sent successfully'], 200);
        } else {
            return response()->json(['message' => 'Unable to send password reset link'], 400);
        }
    }
    protected function broker()
    {
        return Password::broker();
    }
}
