<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withTimestamps();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
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

    public function scopeFilter(Builder $query, array $attributes)
    {
        if (isset($attributes['city_id'])) {
            $query->where('city_id', $attributes['city_id']);
        }
        return $query;
    }
}
