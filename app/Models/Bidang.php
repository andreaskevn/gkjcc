<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidangs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'bidangs_name',
    ];

    public function komisi()
    {
        return $this->hasMany(Komisi::class, 'bidang_id');
    }
}
