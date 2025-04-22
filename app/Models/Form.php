<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_name',
        'form_file',
        'form_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(FormCategories::class, 'form_category_id');
    }
}
