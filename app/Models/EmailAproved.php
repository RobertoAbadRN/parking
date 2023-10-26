<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailAproved extends Model
{
    use HasFactory;
    
    protected $table = 'emails_aproved';

    protected $fillable = [
        'email_content',
        'property_code',
    ];
}
