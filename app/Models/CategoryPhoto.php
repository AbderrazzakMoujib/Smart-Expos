<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPhoto extends Model
{
    protected $fillable = ['category_id', 'path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
