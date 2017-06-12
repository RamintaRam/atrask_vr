<?php

namespace App;

use App\Traits\TableNameTrait;
use Illuminate\Database\Eloquent\Model;

class VRMenu extends Model
{
    use TableNameTrait;
    protected $table = 'vr_menu';

    protected $fillable = ['id', 'new_window', 'sequence', 'vr_parent_id'];
}
