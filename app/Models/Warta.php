<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
    protected $table = 'wartas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'warta_title',
        'warta_file',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
