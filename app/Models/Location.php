<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code'
    ];
    public function departureTrips()
    {
        return $this->hasMany(Trip::class, 'departure_location_id');
    }

    public function arrivalTrips()
    {
        return $this->hasMany(Trip::class, 'arrival_location_id');
    }
}
