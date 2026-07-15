<?php
namespace App\Models;

use App\Core\Model;

class Voucher extends Model {
    protected static string $table = 'vouchers';
    protected static array $fillable = [
        'code', 'type', 'value', 'min_order', 'max_discount',
        'start_date', 'end_date', 'usage_limit', 'is_active'
    ];
}
