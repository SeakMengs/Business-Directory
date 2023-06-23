<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'admin_user';

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_url',
        'add_category',
        'ban_access',
        'access_everything'
    ];

    protected $hidden = [
        'password',
        'api_token',
    ];
}
