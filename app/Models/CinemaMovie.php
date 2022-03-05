<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CinemaMovie extends Pivot
{
    use HasFactory;

    protected $fillable = ['cinema_id', 'movie_id'];

    public $incrementing = true;

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
