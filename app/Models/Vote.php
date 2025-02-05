<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'voter_id',
        'candidate_id'
    ];

    // relasi ke tabel voter
    public function voter()
    {
        return $this->belongsTo(Voter::class);
    }

    // relasi ke tabel candidate
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
