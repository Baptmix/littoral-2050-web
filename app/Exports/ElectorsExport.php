<?php

namespace App\Exports;

use GuzzleHttp\Client;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ElectorsExport implements FromView
{
    public function __construct(string $city, string $code)
    {
        $this->city = $city;
        $this->code = $code;
        return $this;
    }

    public function view(): View
    {

        $client = new Client();
        $response = $client->request('POST', env("APP_API_URL") . "/elector/export", [
            'headers' => [
                'Authorization' => 'Bearer ' . session()->get("token"),
                'Accept' => 'application/json',
            ],
            'form_params' => [
                "city" => $this->city,
                "code" => $this->code
            ]
        ]);
        if ($response->getStatusCode() == 200) {
            $electors = json_decode($response->getBody()->getContents());

            return view('exports.electors', [
                'electors' => $electors,
            ]);
        } else {
            return redirect()->back()->withFail('Une erreur est survenue. (' . $response->getStatusCode() . ')');
        }
    }
}
