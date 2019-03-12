<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gameRequestList extends Model             
{
    
    protected $fillable = ['user_id','game_id','status'];              
}  