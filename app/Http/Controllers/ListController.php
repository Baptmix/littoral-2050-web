<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ListController extends Controller
{

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index() {
        $client = new Client();
        $response = $client->request('GET', env("APP_API_URL") . "/electors/cities/", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);
        if($response->getStatusCode() == 200) {
            $cities = json_decode($response->getBody()->getContents());
            return View('page.list', ["cities" => $cities->cities]);
        }
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findOfficeFromCity(Request $request) {
        $client = new Client();
        $response = $client->request('GET', env("APP_API_URL") . "/electors/offices/" . $request->city, [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ]
        ]);
        if($response->getStatusCode() == 200) {
            $codes = json_decode($response->getBody()->getContents());
            return View('page.list_offices', ["city" => $request->city, "codes" => $codes->codes]);
        }
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listElectors(Request $request) {
        $client = new Client();
        $response = $client->request('POST', env("APP_API_URL") . "/electors/", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
            'form_params' => [
                "city" => $request->city,
                "code" => $request->code
            ]
        ]);
        if($response->getStatusCode() == 200) {
            $electors = json_decode($response->getBody()->getContents());
            return View('page.list_electors', ["city" => $request->city, "code" => $request->code, "electors" => $electors->electors]);
        }
    }
}
