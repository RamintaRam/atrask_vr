<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRPages extends Model
{
    protected $table = 'vr_pages';

    protected $fillable = ['id', 'category_id', 'cover_id'];
}
