<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('created_at','desc')->paginate(5);
        return view('topics.index')->with(compact("topics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = new Topic;
        return view('topics.create')->with(compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new Topic();
        $topic->title = $request->title;
        $topic->body = $request->body;
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect('/topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        $user_id = Auth::id();
        return view('topics.show')->with(compact("topic"))->with(compact("user_id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit')->with(compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        try {
            $topic->title = $request->title;
            $topic->body = $request->body;
            $topic->save();
            return redirect('/topics/' . $topic->id);
        } catch (\Exception $ex) {
            return redirect('/topics')->with('alert', 'Não foi possível editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        try {
            $topic->state = false;
            $topic->save();
        } catch (QueryException $ex) {
            return redirect('/topics')->with('alert', 'Impossível apagar!');
        }

        return redirect('/topics');
    }
}
