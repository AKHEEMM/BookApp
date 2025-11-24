<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'description',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}
