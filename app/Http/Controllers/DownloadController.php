<?php

namespace App\Http\Controllers;


class DownloadController extends Controller
{

    public function ios() {
        header( "Location: itms-services://?action=download-manifest&url=https://littoral-app.fr/app/manifest.plist");
    }
}
