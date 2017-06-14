<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class VRMenuTranslations extends CoreModel
{
    protected $table = 'vr_menu_translations';

    protected $fillable = ['id', 'url', 'name', 'menu_id', 'language_code', 'record_id'];


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
