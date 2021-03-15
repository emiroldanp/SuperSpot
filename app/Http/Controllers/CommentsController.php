<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Serie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $arr = $request->input();
        $comment = new Comment();
        $comment->content = $arr['content'];
        $comment->user()->associate(Auth::user());
    
        $id_serie = $arr['id_serie'];
        $serie = Serie::find($id_serie)->comments()->save($comment);

       
        return redirect()->route('series.show', $id_serie);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comment = Comment::find($id);
        return view('series.commentsedit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $arr = $request->input();
        $comment = Comment::find($id);
        $comment->content = $arr['content'];
        $id_serie =  $comment->serie_id;
        $comment -> save();
        return redirect()->route('series.show', $id_serie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        $id_serie =  $comment->serie_id;
        $comment->delete();
        return redirect()->route('series.show', $id_serie);
    }
}
