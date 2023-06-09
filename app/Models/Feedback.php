<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $primaryKey = 'feedback_id';

    protected $fillable = [
        'feedback',
        'company_id',
        'normal_user_id',
    ];

    public function normalUser() {
        // https://stackoverflow.com/questions/19852927/get-specific-columns-using-with-function-in-laravel-eloquent
        return $this->belongsTo(NormalUser::class, 'normal_user_id', 'normal_user_id')->select(['normal_user_id', 'name']);
    }
}
