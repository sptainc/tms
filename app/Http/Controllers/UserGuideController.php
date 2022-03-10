<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\UserGuide;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class UserGuideController extends Controller
{
    public function index( Request $req )
    {
    	$content = UserGuide::where("uri", $req->uri)->first();
        $content->content = Markdown::convertToHtml($content->content); 
        return view("userguide", compact('content'));
    }
}
