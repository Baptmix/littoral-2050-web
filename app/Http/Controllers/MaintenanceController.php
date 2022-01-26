<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index() {
        $client = new Client();
        $response = $client->request('GET', env("APP_API_URL") . "/maintenance/info", [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
        if($response->getStatusCode() == 200) {
            $respData = json_decode($response->getBody()->getContents(), true);
            $maintenance = null;
            $reason = "";
            if($respData["maintenance"] == 0) {
                $maintenance = false;
                $reason = $respData["reason"];
            } elseif($respData["maintenance"] == 1) {
                $maintenance = true;
                $reason = $respData["reason"];
            }
            return View('admin.maintenance', ["maintenance" => $maintenance, "reason" => $reason]);
        }
    }
    public function update(Request $request) {
        $state = null;
        if ($request->maintenance === "on") {
            $state = 1;
        } else {
            $state = 0;
        }
        $client = new Client();
        $response = $client->request('POST', env("APP_API_URL") . "/maintenance/update", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],
            'form_params' => [
                "maintenance" => $state,
                "reason" => $request->reason,
            ]
        ]);
        if($response->getStatusCode() == 200) {
                return redirect()->back()->withSuccess('Mise à jour effectuée !');
        }
    }
}
