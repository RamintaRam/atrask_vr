<?php

namespace App;

use App\Traits\TableNameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;

class CoreModel extends Model
{
    use Notifiable;

    use SoftDeletes;

    use TableNameTrait;

    protected $hidden = ['deleted_at'];

    public $incrementing = false;

    protected static function boot() {
        parent::boot();
        static::creating(function($model) {
            if(!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });


    }
}
