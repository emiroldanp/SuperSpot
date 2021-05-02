<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;


class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        

        $current_date_time = Carbon::now()->toDateTimeString();

        $hash = md5($current_date_time .'029df42137a1ad8105bcf66a208bc081efbf4559abae7768139eb68365c998fc37636a75');
        $response = Http::get('https://gateway.marvel.com:443/v1/public/comics?format=comic&formatType=comic&noVariants=true&limit=100&orderBy=title&ts='. $current_date_time . '&apikey=abae7768139eb68365c998fc37636a75&hash='. $hash)['data'];
        $date =Carbon::today()->toDateString();
       
        
        $news = Http::get('https://newsapi.org/v2/everything?q=marvel&sortBy=relevancy&language=en&page=1&apiKey=4bbe98577e3c479b86a2691323a56896');
        //dd($news);
        return view('index', ['user' => $user])->with("series",$response)->with("news", $news["articles"]);
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
        
        return view('series.comic', ['comments'=>$comments])->with("serie",$response["results"][0]);
        
       
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
