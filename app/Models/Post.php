<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'image', 'logo', 'body', 'status',
        'img1', 'img2', 'img3', 'video', 'date', 'location',
        'seo_title', 'excerpt', 'meta_description',
        'what_happened', 'what_upcoming', 'recap_video', 'author_id', 'event_type',
    ];
}
