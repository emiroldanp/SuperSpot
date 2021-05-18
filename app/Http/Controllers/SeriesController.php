<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use DB;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        
        $failSearch = false;
        $current_date_time = Carbon::now()->toDateTimeString();

        $hash = md5($current_date_time .'029df42137a1ad8105bcf66a208bc081efbf4559abae7768139eb68365c998fc37636a75');
        $response = Http::get('https://gateway.marvel.com:443/v1/public/comics?dateDescriptor=thisWeek&limit=100&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data'];

        $news = Http::get('https://newsapi.org/v2/everything?q=marvel&sortBy=relevancy&language=en&page=1&apiKey=4bbe98577e3c479b86a2691323a56896');
        //dd($response);
        return view('index', ['user' => $user])->with("series",$response)->with("news", $news["articles"])->with("fail", $failSearch);
    }

    public function alphabetically(User $user){
        $failSearch = false;
        $current_date_time = Carbon::now()->toDateTimeString();
        $hash = md5($current_date_time .'029df42137a1ad8105bcf66a208bc081efbf4559abae7768139eb68365c998fc37636a75');
        $response = Http::get('https://gateway.marvel.com:443/v1/public/comics?orderBy=title&limit=100&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data'];
        $news = Http::get('https://newsapi.org/v2/everything?q=marvel&sortBy=relevancy&language=en&page=1&apiKey=4bbe98577e3c479b86a2691323a56896');
        
        return view('index', ['user' => $user])->with("series",$response)->with("news", $news["articles"])->with("fail", $failSearch);
    }
    public function upComing(User $user){
        $failSearch = false;
        $current_date_time = Carbon::now()->toDateTimeString();
        $hash = md5($current_date_time .'029df42137a1ad8105bcf66a208bc081efbf4559abae7768139eb68365c998fc37636a75');
        $response = Http::get('https://gateway.marvel.com:443/v1/public/comics?dateDescriptor=nextWeek&limit=100&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data'];
        $news = Http::get('https://newsapi.org/v2/everything?q=marvel&sortBy=relevancy&language=en&page=1&apiKey=4bbe98577e3c479b86a2691323a56896');
        
        return view('index', ['user' => $user])->with("series",$response)->with("news", $news["articles"])->with("fail", $failSearch);
    }
    public function character(Request $request, User $user){

        $arr = $request->input();
        $current_date_time = Carbon::now()->toDateTimeString();
        $hash = md5($current_date_time .'029df42137a1ad8105bcf66a208bc081efbf4559abae7768139eb68365c998fc37636a75');
        $news = Http::get('https://newsapi.org/v2/everything?q=marvel&sortBy=relevancy&language=en&page=1&apiKey=4bbe98577e3c479b86a2691323a56896');
       
        if(Http::get('https://gateway.marvel.com:443/v1/public/characters?name='.$arr['name'].'&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data']['results']!= null){
            $failSearch = false;
            $id_character = Http::get('https://gateway.marvel.com:443/v1/public/characters?name='.$arr['name'].'&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data']['results'][0]['id'];
            $response = Http::get('https://gateway.marvel.com:443/v1/public/characters/'.$id_character.'/comics?&limit=100&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data'];
            return view('index', ['user' => $user])->with("series",$response)->with("news", $news["articles"])->with("fail", $failSearch);
        }
        else{
            $failSearch = true;
            $response = Http::get('https://gateway.marvel.com:443/v1/public/comics?dateDescriptor=thisWeek&limit=100&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data'];
            return view('index', ['user' => $user])->with("series",$response)->with("news", $news["articles"])->with("fail", $failSearch);
        }
        
        
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
        $current_date_time = Carbon::now()->toDateTimeString();

        $hash = md5($current_date_time .'029df42137a1ad8105bcf66a208bc081efbf4559abae7768139eb68365c998fc37636a75');
        $response = Http::get('https://gateway.marvel.com:443/v1/public/comics/'. $id .'?&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data'];
        //dd($response);
        
     
        $comments = Comment::where("id_comic","=", $id)->get();

        $total_likes = [];
        $total_dislikes = [];
        foreach ($comments as $key => $value) {
            $total_likes [$value->id] = DB::table('likes_dislikes')->where('comment_id', $value->id)->where('likedislike', true)->count();
            $total_dislikes[$value->id] = DB::table('likes_dislikes')->where('comment_id', $value->id)->where('likedislike', false)->count();
        }

        //dd($total_likes, $total_dislikes);
        
        return view('series.comic', ['comments'=>$comments])->with("serie",$response["results"][0])->with("total_likes", $total_likes)->with("total_dislikes", $total_dislikes);
        
       
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
    }
}
