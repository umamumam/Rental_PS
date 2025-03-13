<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_name', 'customer_phone', 'service_id', 'booking_date', 
        'sessions', 'total_price', 'status', 'payment_status', 'midtrans_order_id', 'payment_status'
    ];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value)
        );
    }

    // Relasi ke Service (setiap booking terkait dengan satu layanan)
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
