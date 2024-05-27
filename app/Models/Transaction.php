<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable =['id', 'trans_type', 'pay_type', 'head_type', 'amount', 'trans_date', 'notes', 'page', 'status', 'createdby', 'created_at', 'updated_at', 'comapany_id', 'session_id', 'type'];
}
