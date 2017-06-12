<?php

namespace App;

use App\Traits\TableNameTrait;
use Illuminate\Database\Eloquent\Model;

class VRPages extends Model
{
    use TableNameTrait;

    protected $table = 'vr_pages';

    protected $fillable = ['id', 'category_id', 'cover_id'];
}
