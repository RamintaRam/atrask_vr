<?php

namespace App\Models;


use App\CoreModel;
use Faker\Provider\Uuid;


class VRResources extends CoreModel
{
    protected $table = 'vr_resources';

    protected $fillable = ['id', 'mime_type', 'path', 'width', 'size', 'height'];
    public $incrementing = false;


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
