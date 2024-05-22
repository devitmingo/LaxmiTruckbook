<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tyre extends Model
{
    use HasFactory;
    protected $fillable =['vechicle_id', 'vechicle_number', 'tyre_type', 'serial_number', 'tyre_company_name', 'meter_reading', 'upload_date', 'tyre_model', 'new_tyre_image', 'old_tyre_image', 'old_tyre_serial_number', 'old_tyre_company_name', 'status', 'created_by', 'created_at', 'updated_at', 'session_id'];
}
