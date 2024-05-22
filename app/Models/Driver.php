<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
   
    protected $fillable = ['id', 'driverName', 'mobile', 'mobile2', 'date_of_joining', 'aadhar_number', 'aadhar_document','driver_photo', 'driving_licence_number', 'driving_licence_document', 'driving_licence_expiry', 'salary', 'address', 'date_of_leave', 'created_at', 'updated_at','status'];
}
