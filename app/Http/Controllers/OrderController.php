<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $produks = Produk::all();
        return view('order.index', compact('orders', 'produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $produks = Produk::all();
        return view('order.create', compact('orders', 'produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'nama' => 'required',
            'produk_id' => 'required',
            'jumlah_beli' => 'required',
            'tgl_pembelian' => 'required'
        ]);

        Order::create([
            'nama' => $request->nama,
            'produk_id' => $request->produk_id,
            'jumlah_beli' => $request->jumlah_beli,
            'tgl_pembelian' => $request->tgl_pembelian,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, $id)
    {
        $orders = Order::find($id);
        $produks = Produk::all();
        return view('order.edit', compact('orders', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'produk_id' => 'required',
            'jumlah_beli' => 'required',
            'ttl_pembelian' => 'required',
            'tgl_pembelian' => 'required'
        ]);

        Order::where('id', $id)->update([
            'nama' => $request->nama,
            'produk_id' => $request->produk_id,
            'jumlah_beli' => $request->jumlah_beli,
            'ttl_pembelian' => $request->ttl_pembelian,
            'tgl_pembelian' => $request->tgl_pembelian,
        ]);

        return redirect()->route('order.index')->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Order::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data Berhasil Dihapus!');
    }

    public function ttlharga()
    {
        $harga = 0;
            
        if ($produk['produk'] == 'Mie Ayam') {
            $harga = 15000;
        } elseif ($produk['produk'] == 'Bakso') {
            $harga = 20000;
        } elseif ($produk['produk'] == 'Soto Ayam') {
            $harga = 12000;
        }

        $ttl_harga = $harga * 'jumlah_beli';
        return view('order.index', compact('ttl_harga'));
    }
}
