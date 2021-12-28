<?php

namespace App\Models;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferStatus extends Model
{
    use HasFactory,
        SoftDeletes,
        CascadeSoftDeletes;

    protected $fillable =
    [
        'name'
    ];
    protected $cascadeDeletes =
    [
        'offers'
    ];
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}

 
