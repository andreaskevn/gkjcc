<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormCategories extends Model
{
    protected $table = 'form_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_category_name',
    ];

    public function form()
    {
        return $this->hasMany(Form::class, 'form_category_id');
    }
}
