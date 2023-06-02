<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $primaryKey = 'company_id';

    protected $fillable = [
        'name',
        'street',
        'city',
        'district',
        'commune',
        'village',
        'logo',
        'email',
        'website',
        'description',
        'company_user_id',
        'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'is_banned',
        'ban_by_admin_id',
    ];

    public function feedbacks() {
        return $this->hasMany(Feedback::class, 'company_id', 'company_id');
    }
}
