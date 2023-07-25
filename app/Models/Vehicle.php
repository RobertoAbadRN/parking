<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $primaryKey = 'id';

    protected $fillable = [
        
        'license_plate',
        'vin',
        'make',
        'model',
        'year',
        'color',
        'vehicle_type',
        'start_date',
        'end_date'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_code', 'property_code');
        
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

public function departament()
{
    return $this->belongsTo(Department::class, 'user_id');
}


  
}

