<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class clubdetails extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        
    ];
     public function Competition(){
        return $this->belongsTo('App\Competition','Competition_id');
     }
    
     public function Club(){
        return $this->belongsTo('App\Club','Club_id');
     }
}

