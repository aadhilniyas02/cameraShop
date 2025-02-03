<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function create()
    {
        return view('auth.adminLogin'); // Path matches - admin Login page
    }

    public function store(Request $request)
    {
        // Validate admin login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to login as admin
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            // check if user is admin
            if ($user->user_type == 'admin') { 
                return redirect()->route('admin.dashboard'); // return redirect('/admin/dashboard');
            }
            
            $token = $user->createToken('auth_token')->plainTextToken;

            // return response()->json([
            //     'message' => 'Login successful',
            //     'token' => $token,
            //     'user' => $user,
            // ]);

             Auth::logout();
             return back()->withErrors(['email' => 'You do not have admin access.']);
        }

        // Return invalid login
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
