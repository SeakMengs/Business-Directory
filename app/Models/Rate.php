<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'rate';

    protected $primaryKey = 'rate_id';

    protected $fillable = [
        'star_number',
        'company_id',
        'normal_user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
