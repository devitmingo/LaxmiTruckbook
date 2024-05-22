<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'partyName', 'vehicleNumber', 'driverName', 'supplierName', 'origin', 'destination', 'billingType', 'party_rate_per', 'party_unit_per', 'partyFreightAmount', 'supplierBillingType', 'truck_rate_per', 'truck_unit_per', 'truckHireAmount', 'startDate', 'endDate', 'startKmsReading', 'endKmsReading', 'pod_receuve_date', 'pod_receuve_doc', 'pod_submitted_date', 'settelement_date', 'status', 'created_at', 'updated_at', 'unloading_date', 'diesel_adv_transport', 'driver_cash_transport', 'unload_rate_per', 'unload_unit_per', 'shortage_qty', 'shortage_amount', 'extra_diesel_amout', 'builty_commission', 'unload_weight_per', 'total_receive', 'toll_amount', 'extra_expenses', 'diesel_rate', 'diesel_ltr', 'extra_diesel_rate', 'extra_diesel_ltr', 'comapany_id', 'created_by', 'session_id'];
}