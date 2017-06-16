<?php

namespace App\Models;

use App\CoreModel;
use Ramsey\Uuid\Uuid;


class VRRoles extends CoreModel
{
    protected $table = 'vr_roles';

    protected $fillable = ['id', 'name', 'comment'];

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

}
