<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementCondition extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function warehouse_one()
    {
        return $this->belongsTo(warehouse::class, 'warehouse_id_one');
    }
    public function warehouse_two()
    {
        return $this->belongsTo(warehouse::class, 'warehouse_id_two');
    }
    public function warehouse_three()
    {
        return $this->belongsTo(warehouse::class, 'warehouse_id_three');
    }
    public function warehouse_four()
    {
        return $this->belongsTo(warehouse::class, 'warehouse_id_four');
    }
}
