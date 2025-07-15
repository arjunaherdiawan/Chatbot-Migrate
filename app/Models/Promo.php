<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $guarded = ['id'];
    protected $table = 'promo';

    protected $cast = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function Motor()
    {
        return $this->belongsTo(Motor::class, 'id_motorcycle', 'id_model');
    }
}
