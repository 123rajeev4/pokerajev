<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctorrating extends Model
{
    //
    
     protected $fillable = [
        'rating','review','doctor_id','user_id'
    ];
}
