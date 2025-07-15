<?php

namespace App\Models;

use App\Models\Brosur;
use App\Models\Harga;
use App\Models\Specs;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $guarded = ['id'];
    protected $table = 'motor';

    public function ModelMotor()
    {
        return $this->belongsTo(Motor::class, 'id_motorcycle', 'id_model');

    }

    public function brosur()
    {
        return $this->hasMany(Brosur::class,'id_motorcycle', 'id_motorcycle');
    }

    public function harga()
    {
        return $this->hasMany(Harga::class,'id_motorcycle', 'id_motorcycle');
    }

    public function specs()
    {
        return $this->hasMany(Specs::class,'id_motorcycle', 'id_motorcycle');
    }
}
