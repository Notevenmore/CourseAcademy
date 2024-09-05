<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['student', 'course'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function scopeMonthlyData($query){
        return $query->selectRaw('YEAR(pembelians.created_at) as year, MONTH(pembelians.created_at) as month, SUM(courses.price) as total_price')
                     ->join('courses', 'pembelians.course_id', '=', 'courses.id')
                     ->groupByRaw('YEAR(pembelians.created_at), MONTH(pembelians.created_at)')
                     ->orderByRaw('YEAR(pembelians.created_at) ASC, MONTH(pembelians.created_at) ASC');
    }
}
