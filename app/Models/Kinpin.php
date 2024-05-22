<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinpin extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'date', 'vehicleNumber', 'driverName', 'place', 'meterReading', 'shop_name', 'staff', 'front_1', 'front_2', 'self_warranty', 'paymentType', 'vendorName', 'created_by', 'comapany_id', 'created_at', 'updated_at'];
}
