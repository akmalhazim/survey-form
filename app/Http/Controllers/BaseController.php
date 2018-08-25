<?php

namespace App\Http\Controllers;

use App\Records;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function submit(Request $request) {
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'question_id' => 'required|integer',
            'answer' => 'required|string|min:1|max:1',
        ]);
        $record = new Records;
        $record->user_id = $request->user_id;
        $record->question_id = $request->question_id;
        $record->answer = $request->answer;
        $record->save();
        return response()->json(['success' => true],201);
    }
}
