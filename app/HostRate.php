<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostRate extends Model             
{
    
    protected $fillable = ['user_id','host_id','rate','type','createdon','review_msg'];              
}  