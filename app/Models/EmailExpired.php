<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailExpired extends Model
{
    use HasFactory;
    protected $table = 'emails_expired';

    protected $fillable = [
        'email_content',
        'property_code',
    ];
}
