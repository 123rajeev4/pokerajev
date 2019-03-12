<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateGame extends Model    
{
    
    protected $fillable = ['user_id', 'event_date', 'event_time','seats','zip_code','event_description','street_number','home_number','status','lat','log','show_data'];     
}  