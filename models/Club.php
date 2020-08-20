<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Club extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'clubName', 'background', 'bar',
    ];
    public function Match(){
        return $this->hasMeny('App\Match');
    }
    public function clubdetails(){
        return $this->hasMany('App\clubdetails');
    }
}
