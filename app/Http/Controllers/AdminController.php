<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Ensure this method is only accessible to admins
    public function index()
    {
        return view('admin.dashboard'); // Adjust to your actual admin dashboard view
    }
}
