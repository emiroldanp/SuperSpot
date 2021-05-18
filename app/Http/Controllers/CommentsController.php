<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\LikesDislike;
use App\Models\Serie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

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
        return response()->json($comment);
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

    public function updateLikes($id, $user){
        if (count(DB::table('likes_dislikes')->where('comment_id', $id)->where('user_id', $user)->get()) == 0) {
            $like = new LikesDislike;
            $comment = Comment::find($id);
            $like->user()->associate(Auth::user());
            $like->comment()->associate($comment);
            $like->likedislike = true;
            $like->save();
        } 
        else {
            #
            $like = LikesDislike::where('comment_id', $id)->where('user_id', $user)->first();
            $like->likedislike = true;
            $like->save();
        }
       
        $total['likes'] =DB::table('likes_dislikes')->where('comment_id', $id)->where('likedislike', true)->count();
        $total['dislikes'] =DB::table('likes_dislikes')->where('comment_id', $id)->where('likedislike', false)->count();
        $total['id'] = $id;
        $total['user_id'] = Comment::find($id)->user_id;
        return response()->json($total);
    }

    public function updateDislikes($id, $user){

        if (count(DB::table('likes_dislikes')->where('comment_id', $id)->where('user_id', $user)->get()) == 0) {
            $dislike = new LikesDislike;
            $comment = Comment::find($id);
            $dislike->user()->associate(Auth::user());
            $dislike->comment()->associate($comment);
            $dislike->likedislike = false;
            $dislike->save();
        } 
        else {
            #
            $dislike = LikesDislike::where('comment_id', $id)->where('user_id', $user)->first();
            
            $dislike->likedislike = false;
            $dislike->save();
        }
        
        
        $total['likes'] =DB::table('likes_dislikes')->where('comment_id', $id)->where('likedislike', true)->count();
        $total['dislikes'] =DB::table('likes_dislikes')->where('comment_id', $id)->where('likedislike', false)->count();
        $total['id'] = $id;
        $total['user_id'] = $user;
        return response()->json($total);
    }
}
