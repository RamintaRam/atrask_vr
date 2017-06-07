<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VRMenu extends Model
{
    protected $table = 'vr_menu';

    protected $fillable = ['id', 'new_window', 'sequence', 'vr_parent_id'];
}
