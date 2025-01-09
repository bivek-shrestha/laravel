<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'specialization_name',
        'description',
        'image',
    ];
    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'specialization_id');
    }
}
