<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];
    protected $table = 'tb_event';

    protected $casts = [
        'tgl_data' => 'date' 
    ];

   
}
