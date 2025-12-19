<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoProgram extends Model
{
    protected $fillable = [
        'name',
        'starts_at',
        'ends_at',
        'is_active'
    ];

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
        'is_active' => 'boolean',
    ];

    public function promoRates()
    {
        return $this->hasMany(PromoRate::class);
    }

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
}
