<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $primaryKey = 'report_id';

    protected $fillable = [
        'reason',
        'company_id',
        'report_by_normal_user_id',
    ];

    public function reportBy() {
        return $this->belongsTo(NormalUser::class, 'report_by_normal_user_id', 'normal_user_id')->select(['normal_user_id', 'name']);
    }
}
