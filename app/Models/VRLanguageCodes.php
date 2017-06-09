<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRLanguageCodes extends Model
{
    public $incrementing = false;

    protected $table = 'vr_language_codes';

    protected $fillable = ['id', 'language_code', 'name', 'is_active'];

    public $timestamps = false;
}
