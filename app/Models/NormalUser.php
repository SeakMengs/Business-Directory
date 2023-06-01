<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NormalUser extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    protected $primaryKey = 'normal_user_id';

    protected $table = 'normal_user';

    protected $guard = 'normalUser';

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo_url'
    ];

    protected $hidden = [
        'password',
    ];

    // The function below are mutators and accessors that will be called automatically
    // Docs: https://laravel.com/docs/8.x/eloquent-mutators#defining-a-mutator

    // Hash the password before saving to the database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Get the role of the user
    public function getRoleAttribute($value)
    {
        return $value == 1 ? 'normalUser' : null;
    }
}
