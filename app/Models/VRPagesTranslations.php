<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRPagesTranslations extends Model
{
    protected $table = 'vr_pages_translations';

    protected $fillable = ['id', 'page_id', 'language_code', 'title', 'description_short', 'description_long', 'slug'];
}
