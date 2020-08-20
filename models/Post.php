<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'title', 'content', 'img','publisherID','time','date','rank',
    ];
    public function Tag(){
        return $this->belongsToMany('App\Tag','tag_post');
    }
    public function User(){
        return $this->belongsTo('App\User','publisherID');
    }
}

