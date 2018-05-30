<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    protected $fillable = ["totals", "userid"];
    public $timestamps = false;
    public function betitems(){
        return $this->hasMany('App\Betitems','betid', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'userid', 'id');
    }
}
