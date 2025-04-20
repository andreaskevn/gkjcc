<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $table = 'scholarships';
    protected $primaryKey = 'id';

    protected $fillable = [
        'scholarship_title',
        'scholarship_description',
        'scholarship_head_cover',
        'scholarship_phone',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
