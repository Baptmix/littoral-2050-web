<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $client = new Client();
        $countElectorsResponse = $client->request('GET', env("APP_API_URL") . "/electors/count/", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);
        $countUsersResponse = $client->request('GET', env("APP_API_URL") . "/users/count/", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);
        if($countElectorsResponse->getStatusCode() == 200 && $countUsersResponse->getStatusCode() == 200) {
            $countElectors = json_decode($countElectorsResponse->getBody()->getContents());
            $countUsers = json_decode($countUsersResponse->getBody()->getContents());
            return View('page.dashboard', ["count_electors" => $countElectors->electors, "count_users" => $countUsers->users]);
        }
    }
}
