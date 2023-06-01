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
        'like',
       
    ];
}
