<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Customer;
use App\Models\Sales;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalCustomer = Customer::count();
        $totalSales = Sales::count();
        $totalPendapatan = Sales::sum('total_harga');
        
        return view('dashboard', compact('totalProduk', 'totalCustomer', 'totalSales', 'totalPendapatan'));
    }
}