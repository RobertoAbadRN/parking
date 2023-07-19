<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;
    protected $fillable = [
        'resident_name',
        'apart_unit',
        'email',
        'phone',
        'property_code',
        'preferred_language',
        'reserved_space',
        'resident_status',
    ];
    public function vehicles()
{
    return $this->hasMany(Vehicle::class);
}
public function departaments()
{
    return $this->hasMany(Departament::class);
}

}
