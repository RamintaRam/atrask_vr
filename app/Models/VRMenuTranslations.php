<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class VRMenuTranslations extends CoreModel
{
    protected $table = 'vr_menu_translations';

    protected $fillable = ['id', 'url', 'name', 'menu_id', 'language_code', 'record_id'];
}
