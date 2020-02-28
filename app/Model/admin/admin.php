<?php

namespace App\Model\admin;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    protected $table='admins';

    protected $guard = 'admin';
    use Notifiable;
}
