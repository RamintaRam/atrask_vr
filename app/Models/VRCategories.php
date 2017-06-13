<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;


class VRCategories extends CoreModel
{
    protected $table = 'vr_categories';

    protected $fillable = ['id'];

    protected $with = ['translation'];

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

    public function translation()
    {
        $lang = app()->getLocale();
        return $this->hasOne(VRCategoriesTranslations::class, 'record_id', 'id')->where('language_code', $lang);
    }
}
