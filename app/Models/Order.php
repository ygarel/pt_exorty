<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'produk_id', 'jumlah_beli', 'ttl_harga', 'tgl_pembelian'
    ];

    public function Produk()
    {
        return $this->hasMany(Produk::class);
    }
}
