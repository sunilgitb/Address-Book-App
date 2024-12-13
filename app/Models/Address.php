<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'contact_name',
        'contact_number',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'pincode',
        'city',
        'state',
        'country',
        'is_default_from',
        'is_default_to',
    ];
}
