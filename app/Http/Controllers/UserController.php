<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }
  
    public function dashboard()
    {
        $user = Auth::user(); // Use the Auth facade to get the authenticated user
        return view('users.dashboard', compact('user'));
    }
}
