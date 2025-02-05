<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'namaKetua',
        'namaWakilKetua',
        'visi',
        'misi',
        'sort_order',
    ];


    // relasi vote
    public function votes()
    {
        // satu candidate bisa memiliki banyak vote
        return  $this->hashMany(Vote::class);
    }
}
