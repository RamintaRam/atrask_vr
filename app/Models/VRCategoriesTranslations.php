<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class VRCategoriesTranslations extends Model
{
    protected $table = 'vr_categories_translations';

    protected $fillable = ['id', 'name', 'language_code', 'category_id', 'record_id'];


    protected static function boot() {
        Model::boot();
        static::creating(function($model) {
            if(!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });
    }
}
