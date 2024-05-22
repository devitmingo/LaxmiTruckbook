<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GearKlatch extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'date', 'vehicleNumber', 'driverName', 'place', 'meterReading', 'shop_name', 'staff', 'clutchplate', 'clutchplate_company', 'fravil', 'fravil_company', 'prasor_plate', 'prasor_plate_company', 'release_bearing', 'release_bearing_company', 'self_warranty', 'mistri', 'paymentType', 'vendorName', 'created_by', 'comapany_id', 'created_at', 'updated_at'];
}
