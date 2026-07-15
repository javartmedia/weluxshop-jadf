<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Booking;
use App\Services\BookingService;

class BookingController extends Controller {
    public function index() {
        $userId = $_SESSION['user_id'];
        $bookings = Booking::query("SELECT * FROM bookings WHERE user_id = ? ORDER BY booking_date DESC", [$userId])->fetchAll();
        $this->view('account/bookings', compact('bookings'));
    }
}
