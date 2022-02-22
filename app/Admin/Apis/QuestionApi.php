<?php
namespace App\Admin\Apis;

use App\Question;
use Illuminate\Http\Request;

class QuestionApi
{
	public function getAll(Request $request) 
	{
		$q = $request->get('q');

    	return Question::where('title', 'like', "%$q%")->paginate(null, ['id', 'title as text']);
	}
}
