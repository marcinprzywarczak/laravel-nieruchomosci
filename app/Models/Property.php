<?php

namespace App\Models;

use App\Models\Offer;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable =
    [
        'property_type_id',
        'adress',
        'area_square_meters',
        'rooms',
        'floor',
        'number_of_floor',
        'description'
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }
}
