<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model             
{
    
    protected $fillable = ['user_id','reported_to','reason','created_at'];              
}  