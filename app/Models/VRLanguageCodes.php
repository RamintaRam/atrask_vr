<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRLanguageCodes extends Model
{
    protected $table = 'vr_language_codes';

    protected $fillable = ['id', 'language_code'];

    protected $updated_at = false;
}
