<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Config;

class ClientConfigController extends Controller
{
    public function index( $uri )
    {
    	$content = Config::where("uri", $uri)->first();
        return view("privacy", compact('content'));
    }
}
