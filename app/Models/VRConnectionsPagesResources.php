<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRConnectionsPagesResources extends Model
{
    protected $table = 'vr_connections_pages_resources';

    protected $fillable = ['resource_id', 'page_id'];
}
