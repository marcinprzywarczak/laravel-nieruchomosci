<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property_type extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable =
    [
        'name'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
