<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repliesreview extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'review_id', 'comment'];
    protected $with = ['user', 'review'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function review(){
        return $this->belongsTo(Review::class);
    }
}
