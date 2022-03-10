<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\UserGuide;
use Illuminate\Http\Request;

class UserGuideController extends Controller
{
    public function index( Request $req )
    {
    	$content = UserGuide::where("uri", $req->uri)->first();
        return view("userguide", compact('content'));
    }
}
