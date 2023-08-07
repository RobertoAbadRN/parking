<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentUpload extends Model {
    use HasFactory;
    protected $fillable = [
        'file_name',
        'filename_original',
        'file_extension',
        'file_path'
    ];
}
