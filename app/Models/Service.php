<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
    ];

    // Relasi ke Booking (satu layanan bisa memiliki banyak booking)
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}