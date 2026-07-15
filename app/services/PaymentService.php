<?php
namespace App\Services;

class PaymentService {
    public function processPayment(array $order): string {
        // integrate with Midtrans/Xendit
        // Return redirect URL / payment token
        return 'https://midtrans.snap.url/...';
    }
}
