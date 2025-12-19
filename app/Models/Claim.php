<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = [
        'code',
        'retail_id',
        'distributor_id',
        'promo_program_id',
        'status',
        'submitted_at',
        'verified_at',
        'ho_reviewed_at',
        'approved_amount',
        'notes'
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'verified_at' => 'datetime',
        'ho_reviewed_at' => 'datetime',
        'approved_amount' => 'integer',
    ];

    public function retail()
    {
        return $this->belongsTo(Retail::class);
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function promoProgram()
    {
        return $this->belongsTo(PromoProgram::class);
    }

    public function items()
    {
        return $this->hasMany(ClaimItem::class);
    }

    public function evidences()
    {
        return $this->hasMany(ClaimEvidence::class);
    }

    public function verifications()
    {
        return $this->hasMany(ClaimVerification::class);
    }

    public function disbursement()
    {
        return $this->hasOne(Disbursement::class);
    }
}
