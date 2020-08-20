<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'compName', 'background', 'bar','logo',
    ];
    public function Match(){
        return $this->hasMeny('App\Match');
    }
    public function clubdetails(){
        return $this->hasMany('App\clubdetails');
    }
}
