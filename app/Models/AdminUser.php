<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
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
        'access_everything',
        'password',
        'api_token',
    ];

    protected $hidden = [
        'password',
        'api_token',
    ];

    // The function below are mutators and accessors that will be called automatically
    // Docs: https://laravel.com/docs/8.x/eloquent-mutators#defining-a-mutator

    // Hash the password before saving to the database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Get the role of the user
    // Will be used to check if the user is a normal user or a company user
    public function getRoleAttribute($value)
    {
        return $value == 3 ? 'adminUser' : null;
    }
}
