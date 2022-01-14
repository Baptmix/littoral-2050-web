<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ElectorController extends Controller
{
    public function edit(int $id) {
        $client = new Client();
        $response = $client->request('GET', env("APP_API_URL") . "/elector/" . $id, [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);

        $citiesRequest = $client->request('GET', env("APP_API_URL") . "/electors/cities/", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);

        $officesDictrictsRequest = $client->request('GET', env("APP_API_URL") . "/electors/offices/districts", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);


        $officeCodesRequest = $client->request('GET', env("APP_API_URL") . "/electors/offices/codes/all", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);

        if($response->getStatusCode() == 200 && $citiesRequest->getStatusCode() == 200 && $officeCodesRequest->getStatusCode() == 200 && $officeCodesRequest->getStatusCode() == 200) {
            $cities = json_decode($citiesRequest->getBody()->getContents());
            $elector = json_decode($response->getBody()->getContents());
            $officesCode = json_decode($officeCodesRequest->getBody()->getContents());
            return View('page.elector.edit', ["elector" => $elector->elector[0], "cities" => $cities->cities, "codes" => $officesCode->codes]);
        }
    }
}
