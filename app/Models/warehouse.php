<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouse extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function stocks()
    {
        return $this->hasMany(productStock::class, 'warehouse_id');
    }

}
