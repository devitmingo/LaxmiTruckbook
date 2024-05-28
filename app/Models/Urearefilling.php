<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urearefilling extends Model
{
    use HasFactory;
    protected $fillable =[ 'id', 'vehicle_id', 'driver_id', 'place', 'meter_reading', 'refilling_date', 'liter', 'amount', 'created_by', 'comapany_id', 'created_at', 'updated_at', 'paymentType', 'vendorName', 'type', 'page', 'session_id', 'self_warranty'];
}
