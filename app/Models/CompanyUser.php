<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyUser extends Model implements Authenticatable
{

    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    public $table = 'company_user';

    protected $guard = 'companyUser';

    protected $fillable = [
        'name',
        'email',
        'password',
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
    // Will be used to check if the user is a normal user or a company user
    public function getRoleAttribute($value)
    {
        return $value == 2 ? 'companyUser' : null;
    }
}
