<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['mentor', 'jurusan'];

    public function material(){
        return $this->hasMany(Material::class);
    }
    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }
    public function pembelian(){
        return $this->hasMany(Pembelian::class);
    }
    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }
}
