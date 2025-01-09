<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    // public function getNameAttribute($value)
    // {
    //     return $this->convertToCamelCase($value);
    // }
    // protected function convertToCamelCase($string)
    // {
    //     $string = strtolower($string);

    //     return ucwords($string);
    // }

    protected $fillable = [
        'name',
        'specialization_id',
        'phone',
        'image',
        'degree',
        'year_of_completion',
        'opd_time'
    ];


    public function specializations(){
        return $this->belongsTo(Specialization::class);
    }
}
