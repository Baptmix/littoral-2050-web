<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ElectorController extends Controller
{
    public function edit(int $id) {
        $client = new Client();
        $response = $client->request('POST', env("APP_API_URL") . "/elector/find", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],

            'form_params' => [
                "id" => $id
            ]
        ]);

        $citiesRequest = $client->request('GET', env("APP_API_URL") . "/electors/cities/all", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],
        ]);

        $officesDictrictsRequest = $client->request('GET', env("APP_API_URL") . "/electors/offices/districts/all", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],
        ]);


        $officeCodesRequest = $client->request('GET', env("APP_API_URL") . "/electors/offices/codes/all", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],
        ]);

        if($response->getStatusCode() == 200 && $citiesRequest->getStatusCode() == 200 && $officeCodesRequest->getStatusCode() == 200 && $officeCodesRequest->getStatusCode() == 200 && $officesDictrictsRequest->getStatusCode() == 200) {
            $cities = json_decode($citiesRequest->getBody()->getContents());
            $elector = json_decode($response->getBody()->getContents());
            $officesCode = json_decode($officeCodesRequest->getBody()->getContents());
            $officesDictricts = json_decode($officesDictrictsRequest->getBody()->getContents());
            return View('elector.edit', ["elector" => $elector->elector[0], "cities" => $cities->cities, "codes" => $officesCode->codes, "districts" => $officesDictricts->districts]);
        }
    }

    public function update(Request $request) {
        $client = new Client();
        $update = $client->request('POST', env("APP_API_URL") . "/elector/update", [
            'headers' => [
                'Authorization' => 'Bearer '. session()->get("token"),
                'Accept' => 'application/json',
            ],
            'json' => [
                'id' => $request->id,
                'birth_name' => $request->birth_name,
                'common_name' => $request->common_name,
                'first_name' => $request->first_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'street_number' => $request->street_number,
                'street_name' => $request->street_name,
                'additional_address_1' => $request->additional_address_1,
                'additional_address_2' => $request->additional_address_2,
                'place' => $request->place,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'department' => $request->department,
                'voting_office_district' => $request->voting_office_district,
                'voting_office_code' => $request->voting_office_code,
                'country' => $request->country,
                'nationality_identifier' => $request->nationality_identifier,
                'note' => $request->note
            ]
        ]);
        if($update->getStatusCode() == 200) {
            return redirect()->back()->withSuccess('Modifications sauvegardées !');
        } else {
            return redirect()->back()->withFail('Une erreur est survenue. (' . $update->getStatusCode() . ')');

        }
    }
}
