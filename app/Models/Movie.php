<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cinemas()
    {
        return $this->belongsToMany(Cinema::class)->withTimestamps();
    }

    public function tickets()
    {
        return $this->hasManyThrough(
            Ticket::class,
            CinemaMovie::class,
            'cinema_id',
            'cinema_movie_id'
        );
    }
}
