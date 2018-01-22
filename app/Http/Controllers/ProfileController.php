<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
}
