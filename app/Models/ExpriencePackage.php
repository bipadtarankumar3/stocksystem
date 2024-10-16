<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpriencePackage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(Documents::class, 'item_id')
        ->where('table_name', 'exprience_packages');
    }
}
