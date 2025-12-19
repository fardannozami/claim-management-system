<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoRate extends Model
{
    protected $fillable = [
        'promo_program_id',
        'product_id',
        'amount_per_item'
    ];

    protected $casts = [
        'amount_per_item' => 'integer',
    ];

    public function promoProgram()
    {
        return $this->belongsTo(PromoProgram::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
