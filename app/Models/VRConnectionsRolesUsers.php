<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRConnectionsRolesUsers extends Model
{
    protected $table = 'vr_connections_users_roles';

    protected $fillable = ['user_id', 'role_id'];




}
