<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'user_id',
        'tmdb_id',
        'title',
        'poster_path',
        'user_rating',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
