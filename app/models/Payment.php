<?php
namespace App\Models;

use App\Core\Model;

class Payment extends Model {
    protected static string $table = 'payments';
    protected static array $fillable = ['order_id', 'amount', 'method', 'status', 'transaction_id', 'paid_at'];
}
