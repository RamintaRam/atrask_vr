<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CoreModel extends Model
{
    use Notifiable;

    use SoftDeletes;

    public $incrementing = false;
}
