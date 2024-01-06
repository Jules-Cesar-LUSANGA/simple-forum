<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Get all users

        $users = User::with(['discussions', 'comments'])->paginate(20);

        return view('users.index', compact('users'));
    }
}
