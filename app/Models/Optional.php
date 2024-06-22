<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
