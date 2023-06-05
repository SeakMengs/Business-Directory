<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    protected $primaryKey = 'service_id';

    protected $fillable = [
        'name',
        'company_id',
        'photo_url',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
