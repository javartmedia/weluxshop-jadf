<?php
namespace App\Services;

use App\Models\Booking;
use App\Models\Treatment;

class BookingService {
    public function createBooking(int $userId, array $data): int {
        // check availability, schedule, etc.
        return Booking::create([
            'user_id' => $userId,
            'treatment_id' => $data['treatment_id'],
            'doctor_id' => $data['doctor_id'],
            'branch_id' => $data['branch_id'],
            'booking_date' => $data['booking_date'],
            'booking_time' => $data['booking_time'],
            'complaint' => $data['complaint'] ?? '',
            'status' => 'pending',
        ]);
    }
}
