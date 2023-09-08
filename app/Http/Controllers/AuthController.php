<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Mail\MyMail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Mail;

use Exception;

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
            ]);

            Auth::login($user);

            return response()->json(['user' => $user, 'message' => 'User registered successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Database error'], 500);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        } catch (\Exception $e) {
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


    public function index()
    {
        // $mailData = [
        //     'title' => 'Mail from ItSolutionStuff.com',
        //     'body' => 'This is for testing email using smtp.'
        // ];
        // Mail::to('lebogang@saatplay.com')->send(new FeedbackMail($mailData));

        // dd("Email is sent successfully.");
        $data = [
            "subject" => "Tutorial Mail",
            "body" => "Hello friends, Welcome to Metrowired Tutorial Mail Delivery!"
        ];
        // MailNotify class that is extend from Mailable class.
        try {
            Mail::to('lebogang@saatplay.com')->send(new FeedbackMail($data));
            return response()->json(['Great! Successfully send in your mail']);
        } catch (Exception $e) {
            return response()->json(['Sorry! Please try again latter']);
        }
    }

    public function sendFeedback(Request $request)
    {
        $message=$request->feedback;

        $data = [
            "subject" => "FinnLittApp Feedback",
            "title"=>"Users Feedback",
            "body" => "Hello Admin,this is the feedback we got from the user,$message"
        ];
        // MailNotify class that is extend from Mailable class.
        try {
            Mail::to('lebogang@saatplay.com')->send(new MyMail($data));
            return response()->json(['Great! Successfully send in your mail']);
        } catch (Exception $e) {
            return response()->json(['Sorry! Please try again latter']);
        }

        //return response()->json($message);

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

    //     public function sendEmail()
// {
//     $mailData = [
//             'title' => 'Mail from ItSolutionStuff.com',
//             'body' => 'This is for testing email using smtp.'
//         ];

    //     Mail::to('lebogang@saatplay.com')->send(new AdminMail($mailData));

    //      dd("Email is sent successfully.");
//     return 'Email sent successfully!';
// }
}
