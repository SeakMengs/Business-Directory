<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
    use HasFactory;

    protected $table = 'company_contact';

    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'phone_number',
        'company_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
