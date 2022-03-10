<?php
namespace App\Admin\Apis;

use App\UserGuide;
use Illuminate\Http\Request;

class UserGuideApi
{
	public function getAll(Request $req) 
	{
		$q = $req->get('q');
		return UserGuide::where('title', 'like', "%$q%")->paginate(null, ['id', 'title as text']);
	}

	public function getByUri ( Request $req )
	{
		$parent = UserGuide::select('id')->where([
			['uri', 'like', '%' . $req->get('q') . '%'],
			['parent_id', null]
		])->first();
		if ( $parent )
			$questions = UserGuide::where('parent_id', $parent->id)->orderBy('updated_at', 'desc')->get();
		else 
			$questions = UserGuide::where('uri', 'like', '%' . $req->get('q') . '%')->orderBy('updated_at', 'desc')->get();

		return response()->json([
                'success' => true,
                'questions' => $questions
            ], 200 );
	}
}
