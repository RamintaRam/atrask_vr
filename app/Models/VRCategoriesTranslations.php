<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRCategoriesTranslations extends Model
{
    protected $table = 'vr_categories_translations';

    protected $fillable = ['id', 'name', 'language_code', 'category_id'];
}
