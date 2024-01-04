<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;
use App\Models\Advice_picture;
use App\Models\Advice_text;
use App\Models\Category;
use App\Models\Quiz_block;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    //

    public function store_quiz_block(Request $request, Quiz_block $quiz_block)
    {
        $input = $request['post'];
    

		//問題作成者の情報の保存
        $user_id = Auth::user()->id;
        $input += [ 'user_id' => $user_id];

	    $quiz_block->fill($input)->save();
    
    
		return redirect('/quizzes/home');
    }

    public function home()
	{
		return view('quizzes.home')->with(['quiz_blocks' => Auth::user()->quiz_blocks()->orderBy('created_at', 'DESC')->paginate(10)]);
	}

    public function create(Category $category)
    {
        return view('quizzes.create')->with(['categories' => $category->get()]);
    }
}
