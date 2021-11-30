<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    protected $dates = [
        'updated_at',
        'created_at'
    ];
    public $timestamps = false;
    protected $fillable = [
        'tentruyen','tomtat','kichhoat','slug_truyen','danhmuc_id','theloai_id','updated_at','created_at','truyen_noibat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';
    public function danhmuctruyen(){
        return $this->belongsTo('App\Models\DanhmucTruyen','danhmuc_id','id');
    } 
    public function chapter(){
        return $this->hasMany('App\Models\Chapter','truyen_id','id');
    } 
    public function theloai(){
        return $this->belongsTo('App\Models\Theloai','theloai_id','id');
    } 
}
