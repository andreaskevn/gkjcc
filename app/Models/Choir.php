<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choir extends Model
{
    protected $table = 'choirs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'choir_name',
        'choir_description',
        'choir_head_cover',
        'choir_description_2',
        'choir_pict',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
