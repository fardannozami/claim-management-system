<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClaimVerification extends Model
{
    protected $fillable = [
        'claim_id',
        'verifier_user_id',
        'action',
        'notes'
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_user_id');
    }
}
