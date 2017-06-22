<?php

namespace App;

class VRPagesTranslations extends CoreModel
{
    protected $table = 'vr_pages_translations';

    protected $fillable = ['id', 'page_id', 'language_code', 'title', 'description_short', 'description_long', 'slug', 'record_id'];


    public function page()
    {
       return $this->hasOne(VRPages::class, 'id', 'record_id');
    }
}
