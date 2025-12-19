<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClaimItem extends Model
{
    protected $fillable = [
        'claim_id',
        'product_id',
        'qty_submitted',
        'qty_approved',
        'unit_amount',
        'subtotal_amount',
        'rejection_reason'
    ];

    protected $casts = [
        'qty_submitted' => 'integer',
        'qty_approved' => 'integer',
        'unit_amount' => 'integer',
        'subtotal_amount' => 'integer',
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
