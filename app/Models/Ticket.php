<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cinema_movie_id'];

    public function cinema_movie()
    {
        return $this->belongsTo(CinemaMovie::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
