<?php

namespace App;

use App\Traits\TableNameTrait;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class VRPages extends CoreModel
{
    use TableNameTrait;

    protected $table = 'vr_pages';

    protected $fillable = ['id', 'category_id', 'cover_id'];

    protected $with = ['translation'];

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

    public function translation()
    {
        $lang = request('language_code');
        if($lang == null)
            $lang = app()->getLocale();

        return $this->hasOne(VRPagesTranslations::class, 'record_id', 'id')
            ->where('language_code', $lang);
    }



}
