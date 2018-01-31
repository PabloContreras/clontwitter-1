<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fav;
use App\Follow;
use Auth;

class ProfileController extends Controller
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


    public function getProfile($id)
    {
    	$user = User::where('nickname',$id)->first();

    	if (!$user) {
    		return redirect('/home');
    	}
    	return view('profile',compact('user'));
    }

    public function myProfile()
    {
    	$user = User::find(Auth::id());
    	return view('profile',compact('user'));
    }
    public function follow($id)
    {
        $user2 = User::find($id);
        if (!$user2) {
            return redirect('/home');
        }
        if (Follow::where('user1_id',Auth::id())->where('user2_id',$user2->id)->count() > 0) {
            Follow::where('user1_id',Auth::id())->where('user2_id',$user2->id)->first()->delete();
            return redirect('/profile/'.$user2->nickname);
        }
        $follow = new Follow;
        $follow->user1_id = Auth::id();
        $follow->user2_id = $id;
        $follow->save();
        return redirect('/profile/'.$user2->nickname);
    }
}
