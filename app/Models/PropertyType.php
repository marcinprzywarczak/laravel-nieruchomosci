<?php

namespace App\Models;

use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyType extends Model
{
    use HasFactory,
        SoftDeletes,
        CascadeSoftDeletes;

    protected $cascadeDeletes =
    [
        'properties'
    ];
    protected $fillable =
    [
        'name',
        'created_by'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
