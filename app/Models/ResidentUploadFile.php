<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentUploadFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_data',
        'upload_id'
    ];
}
