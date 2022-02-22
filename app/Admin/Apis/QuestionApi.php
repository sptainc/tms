<?php
namespace App\Admin\Apis;

use App\Question;
use Illuminate\Http\Request;

class QuestionApi
{
	public function getAll(Request $req) 
	{
		if ( $req->filled("q") ) {
			$q = $req->get('q');
    		return Question::where('title', 'like', "%$q%")->paginate(null, ['id', 'title as text']);
		}
    		return Question::paginate(null, ['id', 'title as text']);
	}
}
