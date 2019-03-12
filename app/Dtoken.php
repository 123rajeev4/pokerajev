<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtoken extends Model
{
    //
    
     protected $fillable = ['user_id', 'token', 'deviceType','deviceToken'];
}
