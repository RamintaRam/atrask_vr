<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRResources extends Model
{
    protected $table = 'vr_resources';

    protected $fillable = ['id', 'mime_type', 'path', 'width', 'size', 'height'];
}
