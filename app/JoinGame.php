<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinGame extends Model             
{
    
    protected $fillable = ['user_id','game_id','status','game_host_id'];              
}  