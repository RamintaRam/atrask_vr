<?php

namespace App\Models;

use App\CoreModel;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class VRUsers extends CoreModel
{
    use Notifiable;

    use SoftDeletes;

    protected $table = 'vr_users';

    protected $fillable = ['id', 'name', 'email', 'password', 'phone'];

    public static function create($record)
    {
    }
}
