<?php

namespace App\Http\Controllers;

use App\Exports\ElectorsExport;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ListController extends Controller
{

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index() {
        $client = new Client();
        $response = $client->request('GET', env("APP_API_URL") . "/electors/cities/all", [
            'headers' => [
                'Authorization' => 'Bearer '. env("APP_API_TOKEN"),
                'Accept' => 'application/json',
            ],
        ]);
        if($response->getStatusCode() == 200) {
            $cities = json_decode($response->getBody()->getContents());
            return View('list.list', ["cities" => $cities->cities]);
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
            return View('list.list_offices', ["city" => $request->city, "codes" => $codes->codes]);
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
            return View('list.list_electors', ["city" => $request->city, "code" => $request->code, "electors" => $electors->electors]);
        }
    }




    function exportCSV(Request $request)
    {
        return Excel::download(new ElectorsExport($request->city, $request->code), 'electeurs_' . $request->city .'_' . $request->code . '.xlsx');

    }
}
