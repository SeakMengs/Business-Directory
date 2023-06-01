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
    ];
}
