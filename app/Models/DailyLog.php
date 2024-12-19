<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyLog extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'daily_logs';

    // The attributes that are mass assignable.
    protected $fillable = [
        'date',
        'time',
        'driver_name',
        'driver_otp',
        'driver_license',
        'plate_number',
        'lto_cr',
        'lto_or',
        'truck_type',
        'commodity_carried',
        'commodity_type',
        'origin',
        'destination',
        'total_weight',
        'allowable_gvw',
        'excess_load',
        'excess_gvw',
        'overloaded_axles',
        'overloaded',
        'apprehended'
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'axle_weights' => 'array', // Casting the JSON field to an array
        'date' => 'date',
        'time' => 'datetime:H:i:s'
    ];

}
