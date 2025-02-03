<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\FaCades\Auth;

class AuthController extends Controller
{

    // Display the login page
    public function showLoginPage()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        // Validate user login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to login as user
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            /** @var \App\Models\MyUserModel $user */
            $user = Auth::user();
    
            // Check if the user is a standard registered user
            if ($user->user_type !== 'user') {
                Auth::logout(); // Log out unauthorized users
                return back()->withErrors(['email' => 'You do not have user access.']);
            }
    
            // Redirect to user dashboard
            return redirect()->route('home')->with('success', 'Login Successful');

            // return response()->json([
            //     'message' => 'Login successful',
            //     'token' => $token,
            //     'user' => $user,
            // ]);
        }
    
        // Return invalid login error
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
    



    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()-delete();

        return response()->json(['message' => 'Logged out successfully']);
    }


    protected function authenticated(Request $request, $user)
        {
            if ($user->user_type === 'admin') {
                return redirect()->route('admin.dashboard'); // Admin Dashboard
            }

            return redirect()->route('dashboard'); // User Dashboard
        }

}
