<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function hotelPolicy()
    {
        return $this->hasMany(HotelPolicy::class, 'hotel_id', 'id');
    }
    public function hotelSaraundings()
    {
        return $this->hasMany(HotelSaraunding::class, 'hotel_id', 'id');
    }

    public function hotelAttributes()
    {
        return $this->hasMany(HotelAttribute::class, 'hotel_id', 'id');
    }
}


