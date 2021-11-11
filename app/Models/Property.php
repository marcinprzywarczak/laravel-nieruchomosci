<?php

namespace App\Models;

use App\Models\Offer;
use App\Models\Property_type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

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
        return $this->belongsTo(Property_type::class);
    }
}
