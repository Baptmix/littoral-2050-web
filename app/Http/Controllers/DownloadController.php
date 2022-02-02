<?php

namespace App\Http\Controllers;


class DownloadController extends Controller
{

    public function ios() {
        return redirect()->intended("https://itms-services://?action=download-manifest&url=https://littoral-app.fr/app/manifest.plist");
    }
}
