<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Savepost extends Model
{
    //

    protected $fillable = [
        'post_id','user_id','usertype'
    ];

}
