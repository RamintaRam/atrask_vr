<?php

namespace App\Models;

use App\CoreModel;

use App\VRConnectionsUsersRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VRUsers extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    protected $table = 'vr_users';

    protected $fillable = ['id', 'name', 'email', 'password', 'phone', 'remember_token'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];


    public function connection()
    {
        return $this->belongsToMany(VRRoles::class, 'vr_connections_users_roles', 'user_id', 'role_id');
    }

    public function rolesConnections()
    {
        return $this->hasMany(VRConnectionsUsersRoles::class, 'user_id', 'id');
    }

}
