<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class DashboardController extends Controller
{
    //
    public function index() {
        $client = new Client();
        $countElectorsResponse = $client->request('GET', env("APP_API_URL") . "/electors/count/", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],
        ]);
        $countUsersResponse = $client->request('GET', env("APP_API_URL") . "/users/count/", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],
        ]);
        $countCompletedElectorsResponse = $client->request('GET', env("APP_API_URL") . "/electors/count/completed", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],
        ]);
        if($countElectorsResponse->getStatusCode() == 200 && $countUsersResponse->getStatusCode() == 200 && $countCompletedElectorsResponse->getStatusCode() == 200) {
            $countElectors = json_decode($countElectorsResponse->getBody()->getContents());
            $countUsers = json_decode($countUsersResponse->getBody()->getContents());
            $countCompletedElectors = json_decode($countCompletedElectorsResponse->getBody()->getContents());
            return View('dashboard', ["count_electors" => $countElectors->electors, "count_users" => $countUsers->users, "count_completed_electors" => $countCompletedElectors->electors]);
        }
    }
}
