<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClaimEvidence extends Model
{
    protected $fillable = [
        'claim_id',
        'type',
        'file_path',
        'uploaded_by',
        'meta'
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
