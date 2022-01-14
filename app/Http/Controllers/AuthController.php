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

    public function login(Request $request) {
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
            dd(($response)->getBody()->getContents());
        }
    }
}
