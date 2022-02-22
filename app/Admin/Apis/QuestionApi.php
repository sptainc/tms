<?php

namespace App\Admin\Apis;

use App\Question;

class QuestionApi
{
	public function getAll(Request $request) 
	{
		$q = $request->get('q');

    	return Question::where('title', 'like', "%$q%")->paginate(null, ['id', 'title as text']);
	}
}
