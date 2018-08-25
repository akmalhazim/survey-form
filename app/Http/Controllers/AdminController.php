<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(Request $request) {
        $request->merge(['choice' => json_encode($request->choice)]);
        $this->validate($request, [
            'question' => 'required|string|min:6|max:1000',
            'choice' => 'required|json',
            'correct_answer' => 'required|string|min:1|max:1'
        ]);

        $question = new Question;
        $question->question_text = $request->question;
        $question->question_choice = $request->choice;
        $question->correct_answer = $request->correct_answer;
        $question->save();

        return response()->json(['success' => true],201);
    }
}
