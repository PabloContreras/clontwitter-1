<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function follows($id)
    {
        return (Follow::where('user1_id',$this->id)->where('user2_id',$id)->count() > 0);
    }
    public function currentFollows()
    {
        return User::findMany(Follow::select('user2_id')->where('user1_id',$this->id)->get());
        //return (Follow::select('user2_id')->where('user1_id',$this->id)->get());
        
    }
    public function retweets() {
        return Tweet::findMany(Retweet::where('user_id',$this->id)->select('tweet_id')->get());
    }
}
