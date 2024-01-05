<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk', 'harga', 'jumlah'
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
