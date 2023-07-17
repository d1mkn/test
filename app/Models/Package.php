<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'width',
        'height',
        'length',
        'weight',
        'customer_name',
        'phone_number',
        'email',
        'sender_address',
        'delivery_address',
    ];
}