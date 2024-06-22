<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $with = ['optionals'];

    protected $fillable = [
        'brand',
        'model',
        'year',
        'version',
        'color',
        'kilometer',
        'fuel',
        'transmission',
        'door',
        'price',
        'supplier',
        'synced_id',
        'synced_at',
    ];

    public function optionals()
    {
        return $this->belongsToMany(Optional::class);
    }
}
