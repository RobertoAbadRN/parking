<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($property) {
            $property->property_code = Str::random(5);
        });
    }
    use HasFactory;
    protected $fillable = [
        'area',
        'name',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'location_type',
        'places',
        'property_code',
        'logo',
    ];
}
