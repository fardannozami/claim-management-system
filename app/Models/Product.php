<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku', 'name'];

    public function promoRates()
    {
        return $this->hasMany(PromoRate::class);
    }

    public function claimItems()
    {
        return $this->hasMany(ClaimItem::class);
    }
}
