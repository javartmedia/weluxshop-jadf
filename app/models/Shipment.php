<?php
namespace App\Models;

use App\Core\Model;

class Shipment extends Model {
    protected static string $table = 'shipments';
    protected static array $fillable = ['order_id', 'courier', 'service', 'tracking_number', 'cost', 'status', 'shipped_at', 'delivered_at'];
}
