<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    //
    public function index() {
        return View('auth.login');
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return redirect()->back()->withFail('Nom d\'utilisateur ou mot de passe incorrect.');
        }

        session()->put('token', auth()->user()->createToken('API Token')->plainTextToken);

        return redirect()->route('dashboard')->withSuccess('Authentification réussie !');


    }

    // this method signs out users by removing tokens
    public function logout()
    {
        auth()->user()->tokens()->delete();
        session()->remove('token');
        return redirect()->route('login')->withSuccess('Déconnexion effectuée.');
    }

    public function forgottenPassword(Request $request) {
        return View('auth.forgotten_password');
    }
}
