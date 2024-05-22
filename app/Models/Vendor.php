<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable =['id', 'vendorName', 'mobile', 'mobile2', 'address', 'status', 'created_at', 'updated_at'];
}
