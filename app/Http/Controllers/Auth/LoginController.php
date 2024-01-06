<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function store(LoginRequest $request)
    {
        // Récupérer les informations de connexions
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            
            session()->regenerate();

            // Rédiriger l'utilisateur sur la page qu'il a demandée, ou sur la home
            return redirect()->intended(route('discussions.index'));
        }else {
            return redirect()->back()
                                ->with('error', "Informations de connexion invalides")
                                ->onlyInput('email');
        }
    }
}
