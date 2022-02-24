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

	public function getByUri ( Request $req )
	{
		$q = $req->get('q');
		$parent = Question::select('id')->where([
			['uri', 'like', '%$q%'],
			['parent_id', null]
		])->first();
		return Question::where('parent_id', $parent->id)->orderBy('updated_at', 'desc')->get();
	}
}
