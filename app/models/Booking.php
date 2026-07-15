<?php
namespace App\Models;

use App\Core\Model;

class Booking extends Model {
    protected static string $table = 'bookings';
    protected static array $fillable = [
        'user_id', 'treatment_id', 'doctor_id', 'branch_id',
        'booking_date', 'booking_time', 'complaint', 'status'
    ];
}
