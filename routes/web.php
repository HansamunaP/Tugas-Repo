<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;
use App\Models\Produk;
use App\Models\Customer;
use App\Models\Sales;

Route::get('/', function () {
    $totalProduk = Produk::count();
    $totalCustomer = Customer::count();
    $totalSales = Sales::count();
    $totalPendapatan = Sales::sum('total_harga');
    $latestProduk = Produk::latest()->take(5)->get();
    
    return view('welcome', compact('totalProduk', 'totalCustomer', 'totalSales', 'totalPendapatan', 'latestProduk'));
})->name('welcome');

Route::resource('produk', ProdukController::class);
Route::resource('customer', CustomerController::class);
Route::resource('sales', SalesController::class);