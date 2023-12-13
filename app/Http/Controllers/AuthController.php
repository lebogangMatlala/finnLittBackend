<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Mail\ForgotPassword;
use App\Mail\MyMail;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Mail;
use Illuminate\Support\Str;

use Exception;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Monolog\Handler\SendGridHandler;


class AuthController extends Controller
{
    //

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phoneNum' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'phoneNum' => $request->phoneNum,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => Carbon::now()
            ]);

            Auth::login($user);

            return response()->json(['user' => $user, 'message' => 'User registered successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Database error'], 500);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Registration error'], 500);
        }

        //return response()->json(['message' => 'User registered successfully']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            //$token = $user->createToken('AuthToken')->accessToken;
            return response()->json(['user' => $user]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function show($id)
    {
        //$id = $request->query('id');
        // Use the `find` method to retrieve a user by their ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Ticket not found'], 404);
        }
        return response()->json($user);
    }


    // public function index()
    // {
    //     // $mailData = [
    //     //     'title' => 'Mail from ItSolutionStuff.com',
    //     //     'body' => 'This is for testing email using smtp.'
    //     // ];
    //     // Mail::to('lebogang@saatplay.com')->send(new FeedbackMail($mailData));

    //     // dd("Email is sent successfully.");
    //     $data = [
    //         "subject" => "Tutorial Mail",
    //         "body" => "Hello friends, Welcome to Metrowired Tutorial Mail Delivery!"
    //     ];
    //     // MailNotify class that is extend from Mailable class.
    //     try {
    //         Mail::to('lebogang@saatplay.com')->send(new FeedbackMail($data));
    //         return response()->json(['Great! Successfully send in your mail']);
    //     } catch (Exception $e) {
    //         return response()->json(['Sorry! Please try again latter', $e]);
    //     }
    // }

    public function sendFeedback(Request $request)
    {
        $message = $request->feedback;

        $data = [
            "subject" => "FinnLittApp Feedback",
            "title" => "Users Feedback",
            "body" => "$message"
        ];
        // MailNotify class that is extend from Mailable class.
        try {
            Mail::to('info@finnlitt.co.za')->send(new MyMail($data));
            return response()->json(['Great! Successfully send in your mail']);
        } catch (Exception $e) {
            return response()->json(['Sorry! Please try again later', $e]);
        }

        //return response()->json($message);

    }

    public function sendResetLinkEmail(Request $request)
    {
        //$request->validate(['email' => 'required|email']);

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirmpassword' => 'required|min:6',
        ]);

        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        //dump($user->email);
        if ($user) {
            //$token = Password::createToken($user);

            if ($request->has('password')) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();
            $useremail = $user->email;
            $data = [
                "subject" => "Password Reset",
                "title" => "Password Reset",
                "body" => "$user->name",
                // "username"=> "$user->name"

            ];


            // MailNotify class that is extend from Mailable class.
            try {
                Mail::to($useremail)->send(new ForgotPassword($data));
                return response()->json(['message' => 'Great! Your password has been reset successfully. You can now log in with your new password.']);
            } catch (Exception $e) {
                return response()->json(['message' => 'Sorry! Please try again later', 'error' => $e->getMessage()]);
            }

        } else {
            return response()->json(['message' => 'User not found in the system. Please check the email address or register if you are a new user.'], 400);
        }
    }


    public function update(Request $request, $id)
    {
        // Validate user input
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'password' => 'sometimes|required|min:8|confirmed',
        // ]);

        // Retrieve the user by ID
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update the password if provided in the request
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return response()->json(['message' => 'User information updated successfully']);
    }


    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user
        $user->delete();

        // Return a response indicating success
        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function showResetForm($token)
    {
        return view('password-reset')->with(compact('token'));
    }


    public function successPage()
    {
        return view('success');
    }
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $token = Str::random(60);
        
        $user->update([
            'reset_token' => $token,
            'remember_token' => Str::random(10), // Generate a new remember token
        ]);

        $resetUrl = env('FRONTEND_URL') . '/password/reset/' . $token;

        $useremail = $user->email;
        $data = [
            "subject" => "Password Reset",
            "title" => "Password Reset",
            "body" => "$user->name",
            "token" => "$token"

        ];

        // TODO: Send email with password reset link including $token
        try {
            Mail::to($useremail)->send(new ForgotPassword($data));
            return response()->json(['message' => 'Great! An email has been sent for password reset.Please check your email and follow the instructions to reset your password.', 'token' => $token]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Sorry! Please try again later', 'error' => $e->getMessage()]);
        }

        //return response()->json(['message' => 'Password reset link sent successfully']);
    }

    public function resetPassword(Request $request, $token)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
        ], [
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // If it's an API request, return JSON response with validation errors
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // If it's a web request, redirect back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Your logic to update the user's password

        // If successful, return a success message
        return Redirect::to('/success-page')->with('success', 'Password reset successfully');


    }



}
