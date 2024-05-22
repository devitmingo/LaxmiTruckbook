<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceForm extends Model
{
    use HasFactory;
    protected $fillable =  ['id', 'date', 'maintenance', 'vehicleNumber', 'driverName', 'meterReading', 'place', 'shop_name', 'staff', 'self_warranty', 'amount', 'paymentType', 'vendorName', 'notes', 'created_by', 'session_id', 'comapany_id', 'created_at', 'updated_at'];
}
