<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\UserGuide;

class UserGuideController extends Controller
{
    public function index( $uri )
    {
    	$content = UserGuide::where("uri", $uri)->first();
        return view("userguide", compact('content'));
    }
}
