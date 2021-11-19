<?php

namespace App\Models;

use App\Models\Property;
use App\Models\OfferStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'property_id',
        'offer_status_id',
        'title',
        'start_date',
        'end_date',
        'price',
        'comment'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function offerStatus()
    {
        return $this->belongsTo(OfferStatus::class);
    }
}
