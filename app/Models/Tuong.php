<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuong extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tensach','kichhoat','slug_sach','hinhanh','updated_at','created_at','luotxem','noidung'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tuong';
}
