<?php

namespace App\Http\Controllers;


class DownloadController extends Controller
{

    public function ios() {
        return View('download.ios');
    }
}
