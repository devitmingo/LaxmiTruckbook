<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable =['id', 'vehicleNumber', 'vehicleType', 'ownership', 'driver_id', 'supplier_id', 'driver_name', 'driver_contact', 'vehicle_tyre', 'vehicle_model', 'manufacturer_company', 'chassis_no', 'engine_no', 'r_c_document', 'insurance_start_date', 'insurance_expiry_date', 'status', 'created_at', 'updated_at', 'createdby', 'comapany_id', 'insurance_document', 'r_c_expiry_date', 'fitness_document', 'fitness_expiry_date', 'tax_pay_document', 'tax_pay_expiry_date', 'permit_document', 'permit_expiry_date'];

}
