<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    /**
     * Créer l'utilisateur
     * @param RegisterRequest $request
     */
    public function store(RegisterRequest $request)
    {
        // Créer l'utilisateur
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        session()->regenerate();

        return redirect()->intended(route('home'));
    }
}