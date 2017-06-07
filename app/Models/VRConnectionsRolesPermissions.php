<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRConnectionsRolesPermissions extends Model
{
    protected $table = 'vr_connections_roles_permissions';

    protected $fillable = ['role_id', 'permission_id'];
}
