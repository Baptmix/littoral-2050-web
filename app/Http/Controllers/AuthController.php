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

    public function forgottenPasswordPost(Request $request) {$client = new Client();
        $response = $client->request('POST', env("APP_API_URL") . "/auth/send-password-reset-link", [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => [
                "email" => $request->email,
            ]
        ]);
        if($response->getStatusCode() == 200) {
            $respData = json_decode($response->getBody()->getContents(), true);
            $data = array_values($respData);
            if($data[0] == false) {
                return redirect()->back()->withFail('Adresse e-mail incorrecte.');

            } else if ($data[0] == true) {
                return redirect()->route('login')->withSuccess('Un mail de réinitialisation vient de vous être envoyé !');
            }
        } else {
            dd($response->getBody()->getContents());
        }
    }

    public function setNewPassword(Request $request) {
        return View('auth.new_password', ["token" => $request->token]);
    }

    public function setNewPasswordPost(Request $request) {
        if($request->password == $request->password_confirmation) {
            $client = new Client();
            $response = $client->request('POST', env("APP_API_URL") . "/auth/reset-password", [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'form_params' => [
                    "email" => $request->email,
                    "password" => $request->password,
                    "resetToken" => $request->resetToken,
                ]
            ]);
            if($response->getStatusCode() == 200) {
                $respData = json_decode($response->getBody()->getContents(), true);
                $data = array_values($respData);
                if($data[0] == false) {
                    return redirect()->back()->withFail('Token ou adresse e-mail incorrect.');

                } else if ($data[0] == true) {
                    return redirect()->route('login')->withSuccess('Votre mot de passe a été changé !');
                }
            } else {
                dd($response->getBody()->getContents());
            }
        } else {

            return redirect()->back()->withFail('Les deux mots de passe ne correspondent pas.');
        }

    }
}
