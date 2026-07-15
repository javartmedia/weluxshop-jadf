<?php
namespace App\Services;

class NotificationService {
    public function sendOrderConfirmation(int $userId, int $orderId): void {
        // send email using PHPMailer
    }
    public function sendBookingReminder(int $bookingId): void {
        // send WA/email
    }
}
