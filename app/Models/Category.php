<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'logo_url',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
