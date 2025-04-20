<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICategory extends Model
{
    protected $table = 'information_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'information_category_name',
    ];

    public function information()
    {
        return $this->hasMany(Information::class, 'category_id');
    }
}
