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
        'ban_by_admin_id',
    ];

    public function feedbacks() {
        return $this->hasMany(Feedback::class, 'company_id', 'company_id');
    }

    public function contacts() {
        return $this->hasMany(CompanyContact::class, 'company_id', 'company_id');
    }

    public function services() {
        return $this->hasMany(Service::class, 'company_id', 'company_id');
    }

    public function galleries() {
        return $this->hasMany(CompanyGallery::class, 'company_id', 'company_id');
    }

    public function rates() {
        return $this->hasMany(Rate::class, 'company_id', 'company_id');
    }

    public function savedCompanies() {
        return $this->hasMany(SavedCompany::class, 'company_id', 'company_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'category_id', 'category_id')->select(['category_id', 'name']);
    }
}
