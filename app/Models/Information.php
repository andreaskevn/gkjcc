<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'information_title',
        'information_description',
        'information_head_cover',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(ICategory::class, 'category_id');
    }
}
