<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'price',
        'provider'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
