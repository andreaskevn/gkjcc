<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pastor extends Model
{
    protected $table = 'pastors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pastor_name',
        'pastor_church',
    ];

    public function worshipschedule()
    {
        return $this->hasMany(WorshipSchedule::class, 'pastor_id');
    }
}
