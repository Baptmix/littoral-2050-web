<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index() {
        $client = new Client();
        $response = $client->request('GET', env("APP_API_URL") . "/users/all", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);
        if($response->getStatusCode() == 200) {
            $users = json_decode($response->getBody()->getContents());
            return View('user.users', ["users" => $users->users]);
        }
    }

    public function edit(int $id) {
        $client = new Client();
        $response = $client->request('GET', env("APP_API_URL") . "/user/" . $id, [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);
        if($response->getStatusCode() == 200) {
            $user = json_decode($response->getBody()->getContents());
            return View('user.edit', ["user" => $user->user[0]]);
        }
    }

    public function delete(int $id) {
        $client = new Client();
        $response = $client->request('GET', env("APP_API_URL") . "/user/delete/" . $id, [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);
        if($response->getStatusCode() == 200) {
            return redirect()->back()->withSuccess('Utilisateur supprimé !');
        } else {
            return redirect()->back()->withFail('Une erreur est survenue. (' . $update->getStatusCode() . ')');
        }
    }

    public function add_post(Request $request) {
        $client = new Client();
        $update = $client->request('POST', env("APP_API_URL") . "/user/add", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
            'json' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ]
        ]);
        if($update->getStatusCode() == 200) {
            return redirect()->back()->withSuccess('Utilisateur ajouté !');
        } else {
            return redirect()->back()->withFail('Une erreur est survenue. (' . $update->getStatusCode() . ')');
        }
    }
    public function add() {
        return View('user.add');
    }

    public function update(Request $request) {
        $client = new Client();
        $update = $client->request('POST', env("APP_API_URL") . "/user/update", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
            'json' => [
                'id' => $request->id,
                'name' => $request->name,
                'email' => $request->email
            ]
        ]);
        if($update->getStatusCode() == 200) {
            return redirect()->back()->withSuccess('Modifications sauvegardées !');
        } else {
            return redirect()->back()->withFail('Une erreur est survenue. (' . $update->getStatusCode() . ')');

        }
    }
}
