<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function favs()
	{
		return $this->hasMany(Fav::class);
	}
	public function retweets()
	{
		return $this->hasMany(Retweet::class);
	}


}
