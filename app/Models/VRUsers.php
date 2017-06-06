<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class VRUsers extends Model
{
    use Notifiable;

    use SoftDeletes;

    protected $table = 'vr_users';

    protected $fillable = ['id', 'first_name', 'last_name', 'email', 'password', 'phone'];
}
