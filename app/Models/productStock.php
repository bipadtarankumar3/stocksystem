<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productStock extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(warehouse::class, 'warehouse_id');
    }

}