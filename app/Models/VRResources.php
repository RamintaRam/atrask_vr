<?php

namespace App;


class VRResources extends CoreModel
{
    protected $table = 'vr_resources';

    protected $fillable = ['id', 'mime_type', 'path', 'width', 'size', 'height'];
}
