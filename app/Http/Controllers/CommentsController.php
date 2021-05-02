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
        $comment->id_comic = (int)$arr['id_comic'];
        $comment->save();

       
        return response()->json($comment);


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
        $id_comic =  $comment->id_comic;
        $comment -> save();
        return redirect()->route('series.show', $id_comic);
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
        $comment->delete();
       
    }

    public function updateLikes($id){
        $comment = Comment::find($id);
        $comment->likes = $comment->likes + 1;
        $comment -> save();
        return response()->json($comment);
    }

    public function updateDislikes($id){
        $comment = Comment::find($id);
        $comment->dislikes = $comment->dislikes + 1;
        $comment -> save();
        return response()->json($comment);
    }
}
