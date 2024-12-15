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
        $produk = Produk::paginate(5);
        return view('page.produk.index')->with([
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'produk' => $request->input('produk'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ];

        Produk::create($data);

        return back()->with('message_delete', 'Data Produk Sudah dihapus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'produk' => $request->input('produk'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ];

        $datas = Produk::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Produk Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Produk Sudah dihapus');
    }

    public function getProduk($id)
    {
        $produk = Produk::find($id);

        return $produk
            ? response()->json(['produk' => $produk])
            : response()->json(
                ['message' => 'Produk tidak ditemukan'],
                404
            );
    }
}
