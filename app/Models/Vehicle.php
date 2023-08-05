<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'license_plate',
        'vin',
        'make',
        'model',
        'year',
        'color',
        'vehicle_type',
        'property_code',
        'user_id',
        'permit_type',
        'start_date',
        'end_date',
        'permit_status',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_code', 'property_code');
    }

  
}

