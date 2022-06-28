<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PalikaProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'pradesh',
        'district',
        'palika',
        'address',
        'logo',
        'client_id',
        'slogan',
        'phone_no',
    ];
}
