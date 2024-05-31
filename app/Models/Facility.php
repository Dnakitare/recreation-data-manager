<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'facility_id', 'latitude', 'longitude', 'type', 'geojson'];

    protected $casts = [
        'geojson' => 'array',
    ];
}
