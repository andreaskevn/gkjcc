<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorshipSchedule extends Model
{
    protected $table = 'worship_schedules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'worship_schedule_name',
        'worship_schedule_hour',
        'pastor_id',
        'category_id',
        'worship_schedule_day',
        'worship_schedule_language',
    ];

    protected $casts = [
        'worship_schedule_hour' => 'datetime',
     ];

    public function category()
    {
        return $this->belongsTo(WorshipScheduleCategory::class, 'category_id');
    }
    public function pastor()
    {
        return $this->belongsTo(Pastor::class, 'pastor_id');
    }
}
