<?php

namespace App;

use App\Traits\TableNameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class CoreModel extends Model
{
    use Notifiable;

    use SoftDeletes;

    use TableNameTrait;

//    protected $hidden = ['deleted_at'];

    public $incrementing = false;
}
