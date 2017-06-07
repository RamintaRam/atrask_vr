<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VROrder extends Model
{
    protected $table = 'vr_order';

    protected $fillable = ['id', 'status', 'user_id'];
}
