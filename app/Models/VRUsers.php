<?php

namespace App\Models;

use App\CoreModel;

use App\Traits\TableNameTrait;
use App\VRConnectionsUsersRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ramsey\Uuid\Uuid;

class VRUsers extends Authenticatable
{
    use TableNameTrait;

    use Notifiable;

    use SoftDeletes;

    public $incrementing = false;

    protected $table = 'vr_users';

    protected $fillable = ['id', 'name', 'email', 'password', 'phone', 'remember_token'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
    ];


    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            if (!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });
    }



    public function connection()
    {
        return $this->belongsToMany(VRRoles::class, 'vr_connections_users_roles', 'user_id', 'role_id');
    }

    public function rolesConnections()
    {
        return $this->hasOne(VRConnectionsUsersRoles::class, 'user_id', 'id');
    }

}
