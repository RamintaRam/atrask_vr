<?php

namespace App;

use App\Traits\TableNameTrait;
use Illuminate\Database\Eloquent\Model;

class VRReservations extends Model
{

    use TableNameTrait;

    protected $table = 'vr_reservations';

    protected $fillable = ['id', 'experience_id', 'order_id', 'time'];
}


