<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedCompany extends Model
{
    use HasFactory;

    protected $table = 'saved_company';

    protected $primaryKey = 'saved_company_id';

    protected $fillable = [
        'company_id',
        'normal_user_id',
    ];

    public function company() {
        return $this->hasOne(Company::class, 'company_id', 'company_id');
    }
}
