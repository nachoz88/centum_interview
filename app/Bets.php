<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    protected $fillable = ["totals", "userid"];
    public $timestamps = false;
}
