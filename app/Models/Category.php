<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'order', 'parent_id', 'cover', 'post_id', 'type'];

    public function photos()
    {
        return $this->hasMany(CategoryPhoto::class);
    }
}
