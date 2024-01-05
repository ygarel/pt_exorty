<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required',
            'jumlah' => 'required',
        ]);

        Produk::create([
            'produk' =>$request->produk,
            'jumlah' =>$request->jumlah,
        ]);

        return redirect()->back()->with('success', 'Produk Berhasil Ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk, $id)
    {
        $produks = Produk::find($id);
        return view('produk.edit', compact('produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'produk' => 'required',
            'jumlah' => 'required',
        ]);

        Produk::where('id', $id)->update([
            'produk' =>$request->produk,
            'jumlah' =>$request->jumlah,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk Berhasil Ditambahkan!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produk::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data Berhasil Dihapus!');
        
    }

}