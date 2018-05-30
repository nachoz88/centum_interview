<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Betitems extends Model
{
    protected $fillable = ["betid", "teamid", "amount"];
    public $timestamps = false;
    
    public function teams(){
        return $this->belongsTo('App\Teams', 'teamid', 'id');
    }
}
