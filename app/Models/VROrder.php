<?php

namespace App;

use App\Traits\TableNameTrait;
use Illuminate\Database\Eloquent\Model;

class VROrder extends Model
{
    use TableNameTrait;

    protected $table = 'vr_order';

    protected $fillable = ['id', 'status', 'user_id'];
}
