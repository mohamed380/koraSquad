<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
      protected $fillable = [
        'date', 'time', 'location','FCGoals','SCGoals','status',
    ];
    public function Competition(){
        return $this->belongsTo('App\Competition','Competition_id');
    }
    public function FC(){
        return $this->belongsTo('App\Club','FC_id');
    }
    public function SC(){
        return $this->belongsTo('App\Club','SC_id');
    }
        public function setUpdatedAt($value)
    {
      return NULL;
    }


    public function setCreatedAt($value)
    {
      return NULL;
    }
}
