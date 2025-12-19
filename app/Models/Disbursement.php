<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disbursement extends Model
{
    protected $fillable = [
        'claim_id',
        'amount',
        'method',
        'provider_ref',
        'status',
        'paid_at'
    ];

    protected $casts = [
        'amount' => 'integer',
        'paid_at' => 'datetime',
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }
}
