<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        // Product belongs to one Category
        return $this->belongsTo(category::class, 'category_id');
    }

    public function uom()
    {
        // Product belongs to one UOM
        return $this->belongsTo(uom::class, 'uom_id');
    }

    public function stocks()
    {
        return $this->hasMany(productStock::class, 'product_id');
    }

}
