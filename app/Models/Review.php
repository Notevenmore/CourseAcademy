<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'material_id', 'comment'];
    protected $with = ['user', 'material'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function repliesreview(){
        return $this->hasMany(Repliesreview::class);
    }
}
