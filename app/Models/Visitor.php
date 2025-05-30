<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';
    protected $fillable = ['ip_address', 'visited_at', 'created_at', 'updated_at'];
}
