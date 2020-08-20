<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Video extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'frame','title',
    ];
     public function Tag(){
        return $this->belongsToMany('App\Tag','tag_video');
     }
    
}

