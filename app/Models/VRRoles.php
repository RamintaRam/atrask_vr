<?php

namespace App\Models;

use App\CoreModel;


class VRRoles extends CoreModel
{
    protected $table = 'vr_roles';

    protected $fillable = ['id', 'name', 'comment'];

    public static function find($id)
    {
    }
}
