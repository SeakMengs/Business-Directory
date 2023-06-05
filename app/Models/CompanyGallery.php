<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGallery extends Model
{
    use HasFactory;

    protected $table = 'company_gallery';

    protected $primaryKey = 'gallery_id';

    protected $fillable = [
        'photo_url',
        'company_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
