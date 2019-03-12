<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    
     protected $fillable = [
        'email','speciality_id','clinic','licence_number','expertise_area','insurance_accept','password','admin_status','phone','fullname','image','avilability','qualification','fee','start_time','end_time'
    ];
}
