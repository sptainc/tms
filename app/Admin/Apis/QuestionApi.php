<?php
namespace App\Admin\Apis;

use App\Question;
use App\UserGuide;
use Illuminate\Http\Request;

class QuestionApi
{
	public function getAll(Request $req) 
	{
		$q = $req->get('q');
		return Question::where('title', 'like', "%$q%")->paginate(null, ['id', 'title as text']);
	}

	public function getByUri ( Request $req )
	{
		$parent = Question::select('id')->where([
			['uri', 'like', '%' . $req->get('q') . '%'],
			['parent_id', null]
		])->first();
		if ( $parent ) {
			$questions = Question::where('parent_id', $parent->id)->orderBy('updated_at', 'desc')->get();
			$userGuide = UserGuide::where('parent_id', $parent->id)->orderBy('updated_at', 'desc')->get();
		}
		else {
			$questions = Question::where('uri', 'like', '%' . $req->get('q') . '%')->orderBy('updated_at', 'desc')->get();
			$userGuide = UserGuide::where('uri', 'like', '%' . $req->get('q') . '%')->orderBy('updated_at', 'desc')->get();
		}

		return response()->json([
                'success' => true,
                'questions' => $questions,
                'user_guide' => $userGuide,
                'version' => "v1"
            ], 200 );
	}
}
