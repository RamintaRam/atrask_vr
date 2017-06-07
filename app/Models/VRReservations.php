<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRReservations extends Model
{
    protected $table = 'vr_reservations';

    protected $fillable = ['id', 'experience_id', 'order_id', 'time'];
}
