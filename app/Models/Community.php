<?php

namespace App\Models;

use App\Models\CommunityMember;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $guarded = ['id'];
    protected $table = 'community';

    protected $casts =[
        'is_active' => 'boolean',
    ];

    public function members()
    {
        return $this->hasMany(Community::class, 'id_community', 'id_community');

    }

}
