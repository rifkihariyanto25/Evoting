<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        // 'nim',
        'name'
    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
