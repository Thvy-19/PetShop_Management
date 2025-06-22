<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'species', 'breed', 'date_of_birth', 'gender', 'profile_image', 'description', 'owner_id'
    ];
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
