<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRPermissions extends Model
{
    protected $table = 'vr_permissions';

    protected $fillable = ['id', 'name', 'comment'];
}
