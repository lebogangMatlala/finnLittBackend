<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Mail;
use Illuminate\Support\Facades\Password;


class ResetPasswordController extends Controller
{
    // Send reset link email
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            // Generate the reset link URL with the token and send the email
            $token = '123'; // Get the token from the response or database
            $resetLink = url("password/reset/$token");

            try {
                Mail::to($request->email)->send(new ResetPassword($resetLink));
            } catch (\Exception $e) {
                // Log the error for debugging
                Log::error('Email sending error: ' . $e->getMessage());
                return response()->json(['message' => 'Unable to send reset link.'], 400);
            }


            return response()->json(['message' => 'Password reset link sent to your email.'], 200);
        }

        return response()->json(['message' => 'Unable to send reset link.'], 400);
    }

    // Reset password
    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $credentials = $request->only(
            'email',
            'password',
            'password_confirmation',
            'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        });

        return $response == Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password reset successful.'], 200)
            : response()->json(['message' => 'Unable to reset password.'], 400);
    }
}
