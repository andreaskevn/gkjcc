<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorshipScheduleCategory extends Model
{
    protected $table = 'worship_schedule_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'worship_schedule_category_name',
    ];

    public function worshipschedule()
    {
        return $this->hasMany(WorshipSchedule::class, 'category_id');
    }
}
