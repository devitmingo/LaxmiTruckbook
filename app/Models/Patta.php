<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patta extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'date', 'vehicleNumber', 'driverName', 'place', 'meterReading', 'pattaStatus', 'photo', 'staff', 'paymentType', 'vendorName', 'created_by', 'comapany_id', 'created_at', 'updated_at'];
}
