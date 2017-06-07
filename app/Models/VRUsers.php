<?php

namespace App\Models;

use App\CoreModel;

use App\VRConnectionsUsersRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class VRUsers extends CoreModel
{
    use Notifiable;

    use SoftDeletes;

    protected $table = 'vr_users';

    protected $fillable = ['id', 'name', 'email', 'password', 'phone'];


    public function connection()
    {
        return $this->belongsToMany(VRRoles::class, 'vr_connections_users_roles', 'user_id', 'role_id');
    }

    public function rolesConnections()
    {
        return $this->hasMany(VRConnectionsUsersRoles::class, 'user_id', 'id');
    }

}
