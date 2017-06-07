<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRMenuTranslations extends Model
{
    protected $table = 'vr_menu_translations';

    protected $fillable = ['id', 'url', 'name', 'menu_id', 'language_code'];
}
