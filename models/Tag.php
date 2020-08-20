<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tag extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'tagName','postID',
    ];
    public function Post(){
        return $this->belongsToMany('App\Post','tag_post');
    }
    public function Video(){
        return $this->belongsToMany('App\Video','tag_video');
    }
}

