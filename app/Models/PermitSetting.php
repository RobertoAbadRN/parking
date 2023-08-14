<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitSetting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Property()
    {
        return $this->belongsTo('App\Models\Property');
    }

    public static function  types() {
        $types = [
            "Resident" => "resident",
            "Visitor" => "visitor",
            "Sub-contractor" => "sub_contractor",
            "Carport" => "carport",
            "Temporary" => "temporary",
            "Reserved" => "reserved",
            "Vip" => "vip",
            "Contractor" => "contractor",
            "Employee" => "employee"
        ];

        return $types;
    }

    public static function typePermit($property) {

        $setting = PermitSetting::where('property_id', $property)->first();
        $types = [];
        if($setting) {
            if($setting->resident == 1 ) {
                array_push($types, [
                    "Resident" => "resident",
                ]);
            }
            if($setting->visitor == 1 ) {
                array_push($types, [
                    "Visitor" => "visitor",
                ]);
            }
            if($setting->sub_contractor == 1 ) {
                array_push($types, [
                    "Sub-contractor" => "sub_contractor",
                ]);
            }
            if($setting->carport == 1 ) {
                array_push($types, [
                    "Carport" => "carport",
                ]);
            }
            if($setting->temporary == 1 ) {
                array_push($types, [
                    "Temporary" => "temporary",
                ]);
            }
            if($setting->reserved == 1 ) {
                array_push($types, [
                    "Reserved" => "reserved",
                ]);
            }
            if($setting->vip == 1 ) {
                array_push($types, [
                    "Vip" => "vip",
                ]);
            }
            if($setting->contractor == 1 ) {
                array_push($types, [
                    "Contractor" => "contractor",
                ]);
            }
            if($setting->employee == 1 ) {
                array_push($types, [
                    "Employee" => "employee",
                ]);
            }
        }
        return $types;
    }
}
