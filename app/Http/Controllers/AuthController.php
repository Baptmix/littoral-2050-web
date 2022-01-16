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

    public function login(Request $request, Guard $guard) {
        $client = new Client();
        $response = $client->request('POST',env('APP_API_URL') . "/auth/login/", [
            'json' => [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
        if($response->getStatusCode() == 200) {
            $guard->validate();
            $user = $guard->user();

            dd($user);
            dd(($response)->getBody()->getContents());
        }
    }

    public function forgottenPassword(Request $request) {
        return View('auth.forgotten_password');
    }
}
