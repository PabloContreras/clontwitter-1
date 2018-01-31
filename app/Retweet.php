<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retweet extends Model
{
    public function tweet()
	{
		return $this->belongsTo(Tweet::class);
	}
}
