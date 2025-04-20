<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class WeeklySchedule extends Model
{
    protected $table = 'weekly_schedules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'weekly_schedule_name',
        'weekly_schedule_hour',
        'weekly_schedule_day',
    ];

    protected $casts = [
        'weekly_schedule_hour' => 'datetime',
    ];
}
