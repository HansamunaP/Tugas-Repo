<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $fillable = ['produk_id', 'customer_id', 'jumlah', 'total_harga', 'tanggal']; // ← pakai 'tanggal'
    
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}