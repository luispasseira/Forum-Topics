<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Topic;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $answer = new Answer();
        $topic = Topic::find($id);
        return view('answers.create')->with(compact('answer'))->with(compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = new Answer();
        $answer->body = $request->body;
        $answer->topic_id = $request->topic_id;
        $answer->user_id = Auth::id();
        $answer->save();

        return redirect('/topics/' . $answer->topic_id);
    }
}
