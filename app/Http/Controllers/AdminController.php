<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->user_type === 'admin') {
            return view('admin.dashboard'); // Return the admin dashboard view
        }
    
        // If not an admin, abort with a 403 Forbidden response
        abort(403, 'Unauthorized access');
    }
}
