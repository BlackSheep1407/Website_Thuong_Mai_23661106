<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'user_username',
        'user_password',
        'user_fullname',
        'user_email',
        'user_phone',
        'user_address',
        'user_role',
    ];
}
