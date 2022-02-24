<?php
namespace App\Admin\Apis;

use App\Question;
use Illuminate\Http\Request;

class QuestionApi
{
	public function getAll(Request $req) 
	{
		$q = $req->get('q');
		return Question::where('title', 'like', "%$q%")->paginate(null, ['id', 'title as text']);
	}

	public function getByUri ( $uri, Request $req )
	{
		$parent = Question::select('id')->where([
			['uri', 'like', '%$uri%'],
			['parent_id', null]
		])->first();
		return Question::where('parent_id', $parent->id)->orderBy('updated_at', 'desc')->get();
	}
}
