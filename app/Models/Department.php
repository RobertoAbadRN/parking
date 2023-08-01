<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'apart_unit', 'reserved_space', 'property_code', 'permit_status'];
    

    
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming the foreign key is 'user_id'
    }

}
