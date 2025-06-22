<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone', 'email','profile_image'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}