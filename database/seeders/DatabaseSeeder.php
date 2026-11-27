<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Customer;
use App\Models\Sales;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'nama' => 'Laptop Asus',
            'jumlah' => 10,
            'jenis' => 'Elektronik',
            'harga' => 7500000
        ]);
        
        Produk::create([
            'nama' => 'Mouse Logitech',
            'jumlah' => 50,
            'jenis' => 'Aksesoris',
            'harga' => 150000
        ]);
        
        Customer::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'telepon' => '08123456789',
            'alamat' => 'Jl. Merdeka No. 123'
        ]);
        
        Customer::create([
            'nama' => 'Siti Aminah',
            'email' => 'siti@email.com',
            'telepon' => '08198765432',
            'alamat' => 'Jl. Sudirman No. 45'
        ]);
    }
}