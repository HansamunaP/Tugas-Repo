<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Produk;
use App\Models\Customer;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with(['produk', 'customer'])->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $produk = Produk::all();
        $customer = Customer::all();
        return view('sales.create', compact('produk', 'customer'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'customer_id' => 'required|exists:customer,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date'
        ]);

        // Cari produk dengan find Or Fail (akan error jika tidak ditemukan)
        $produk = Produk::findOrFail($request->produk_id);
        
        // Hitung total harga
        $total_harga = $produk->harga * $request->jumlah;
        
        // Cek stok
        if ($produk->jumlah < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $produk->jumlah);
        }
        
        // Buat sales
        Sales::create([
            'produk_id' => $request->produk_id,
            'customer_id' => $request->customer_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal' => $request->tanggal
        ]);
        
        // Kurangi stok produk
        $produk->jumlah -= $request->jumlah;
        $produk->save();
        
        return redirect()->route('sales.index')->with('success', 'Sales berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sales = Sales::findOrFail($id);
        $produk = Produk::all();
        $customer = Customer::all();
        return view('sales.edit', compact('sales', 'produk', 'customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'customer_id' => 'required|exists:customer,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date'
        ]);

        $sales = Sales::findOrFail($id);
        $produk = Produk::findOrFail($request->produk_id);
        
        // Kembalikan stok lama dulu
        $oldProduk = Produk::findOrFail($sales->produk_id);
        $oldProduk->jumlah += $sales->jumlah;
        $oldProduk->save();
        
        // Hitung total harga baru
        $total_harga = $produk->harga * $request->jumlah;
        
        // Cek stok baru
        if ($produk->jumlah < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $produk->jumlah);
        }
        
        // Update sales
        $sales->update([
            'produk_id' => $request->produk_id,
            'customer_id' => $request->customer_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal' => $request->tanggal
        ]);
        
        // Kurangi stok produk baru
        $produk->jumlah -= $request->jumlah;
        $produk->save();
        
        return redirect()->route('sales.index')->with('success', 'Sales berhasil diupdate');
    }

    public function destroy($id)
    {
        $sales = Sales::findOrFail($id);
        
        // Kembalikan stok produk
        $produk = Produk::findOrFail($sales->produk_id);
        $produk->jumlah += $sales->jumlah;
        $produk->save();
        
        $sales->delete();
        
        return redirect()->route('sales.index')->with('success', 'Sales berhasil dihapus');
    }
}