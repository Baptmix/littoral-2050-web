<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SupportController extends Controller
{


    public function index(Request $request) {
        return View('support');
    }

    public function support(Request $request) {
        $request->validate([
            'email' => 'required',
            'message' => 'required',
        ]);

        $client = new Client();
        $update = $client->request('POST', env("APP_API_URL") . "/support/send", [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'json' => [
                'email' => $request->email,
                'message' => $request->message,
            ]
        ]);
        if($update->getStatusCode() == 200) {

            return redirect()->back()->withSuccess('Votre message a été envoyé avec succès !');
        }
    }


    public function engagement_de_confidentialite(Request $request) {
        return View('engagement-de-confidentialite');
    }
}
