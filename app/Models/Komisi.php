<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komisi extends Model
{
    protected $table = 'commissions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'commission_name',
        'commission_description',
        'commission_head_cover',
        'commission_description_2',
        'commission_pict',
        'user_id',
        'bidang_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bidangs()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
