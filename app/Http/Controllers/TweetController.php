<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Tweet;
use App\User;
use App\Fav;
use App\Retweet;
use App\Follow;
use Auth;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TweetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweet1 = Auth::user()->tweets()->get();
        $tweet2 = Auth::user()->retweets();
        
        $tweet3 = collect(Auth::user()->currentFollows());

        $tweet4 = $tweet3->each(function ($tweets_id,$key) {
            $tweets = tweet::whereIn('id',Auth::user());
            return $tweets;  
        });
        return $tweet4;
        return view('home',compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tweet = new Tweet;
        $this->validate($request, [
            'tweet' => 'required|string|max:140',
        ]);

        $tweet->user_id = Auth::id();
        $tweet->body = $request->tweet;
        $tweet->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweet::find($id);

        if (!$tweet) {
            return redirect('/home');
        } 

        return view('tweet.show',compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = Tweet::find($id);

        if (!$tweet) {
            return redirect('/home');
        }

        return view('tweet.edit',compact('tweet'));
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
        $tweet = Tweet::find($id);

        if (!$tweet) {
            return redirect('/home');
        }

        $this->validate($request, [
            'tweet' => 'required|string|max:140',
        ]);

        $tweet->body = $request->tweet;
        $tweet->save();

        return redirect('/home');
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

    public function fav($id)
    {
        $tweet = Tweet::find($id);
        if(!$tweet) {
            return redirect('/home');
        }
        if(Fav::where('user_id',Auth::id())->where('tweet_id',$tweet->id)->count() > 0){
            Fav::where('user_id',Auth::id())->where('tweet_id',$tweet->id)->first()->delete();
            return redirect('/tweet/'.$tweet->id);
        }
        $fav = new Fav;
        $fav->tweet_id = $tweet->id;
        $fav->user_id = Auth::id();
        $fav->save();
        return redirect('/tweet/'.$tweet->id);       
    }

    public function rt($id)
    {
        $tweet = Tweet::find($id);
        if(!$tweet) {
            return redirect('/home');
        }
        if(Retweet::where('user_id',Auth::id())->where('tweet_id',$tweet->id)->count() > 0){
            Retweet::where('user_id',Auth::id())->where('tweet_id',$tweet->id)->first()->delete();
            return redirect('/tweet/'.$tweet->id);
        }
        $retweet = new Retweet;
        $retweet->tweet_id = $tweet->id;
        $retweet->user_id = Auth::id();
        $retweet->save();
        return redirect('/tweet/'.$tweet->id); 
    }

}
