<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_code',
        'vehicles_per_apartment',
        'tenants_change_info',
        'notify_on_tenants_info',
        'maximum_of_changes_allowed',
        'reserved_spot_allow',
        'reserved_spot_per_apartment',
        // Agrega más campos aquí según sea necesario
    ];
}
