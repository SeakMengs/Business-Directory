<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'admin_user';

    protected $primaryKey = 'admin_user_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_url',
       
    ];
}
