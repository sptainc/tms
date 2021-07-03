<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Config;

class ClientConfigController extends Controller
{
    public function index()
    {
    	$content = Config::where("uri", "privacy-page")->first();
        return view("privacy", compact('content'));
    }
}
