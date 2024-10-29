<?php

namespace App\Http\Controllers;

use App\Models\Konsinyasi;
use App\Models\Konsinyasi_Produk;
use App\Models\Produk;
use Illuminate\Http\Request;

class Konsinyasi_ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsinyasi_produk = Konsinyasi_Produk::paginate(5);
        $konsinyasi = Konsinyasi::all();
        $produk = Produk::all();
        return view('page.konsinyasi_produk.index')->with([
            'konsinyasi_produk' => $konsinyasi_produk,
            'konsinyasi' => $konsinyasi,
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
            'id_konsinyasi' => $request->input('id_konsinyasi'),
            'id_produk' => $request->input('id_produk'),
            'stok' => $request->input('stok'),
            'tgl_konsinyasi' => $request->input('tgl_konsinyasi')
        ];

        $id_produk = $request->input('id_produk');
        $stokKonsinyasi = $request->input('stok');
        $produk = Produk::where('id', $id_produk)->first();
        $stokProduk = $produk->stok;


        $dataProduk = [
            'stok' => $stokProduk + $stokKonsinyasi
        ];

        $updateProduk = Produk::findOrFail($id_produk);
        $updateProduk->update($dataProduk); 

        Konsinyasi_Produk::create($data);

        return back()->with('message_delete', 'Data Konsumen Sudah dihapus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
            'id_konsinyasi' => $request->input('id_konsinyasi_edit'),
            'id_produk' => $request->input('id_produk_edit'),
            'stok' => $request->input('stok'),
            'tgl_konsinyasi' => $request->input('tgl_konsinyasi')
        ];

        $id_produk = $request->input('id_produk_edit');
        $stokKonsinyasiP = $request->input('stok');

        $produkKonsinyasi = Konsinyasi_Produk::where('id', $id)->first();
        $stokLama = $produkKonsinyasi->stok;

        if ($stokLama < $stokKonsinyasiP){
            $tambahStok = $stokKonsinyasiP - $stokLama;
            $stokUpdate = $stokLama + $tambahStok;
        } else {
            $kurangiStok = $stokLama - $stokKonsinyasiP;
            $stokUpdate = $stokLama - $kurangiStok;
        }

        $dataProduk = [
            'stok' => $stokUpdate
        ];

        $updateProduk = Produk::findOrFail($id_produk);
        $updateProduk->update($dataProduk); 

        $konsinyasiProduk = Konsinyasi_Produk::findOrFail($id);
        $konsinyasiProduk->update($data);
        return back()->with('message_delete', 'Data Konsumen Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataKonsinyasiP = Konsinyasi_Produk::where('id', $id)->first();
        $id_produk = $dataKonsinyasiP->id_produk;
        $stokKonsinyasiP = $dataKonsinyasiP->stok;

        $produk = Produk::where('id', $id_produk)->first();
        $stokProduk = $produk->stok;
        $dataProduk = [
            'stok' => $stokProduk - $stokKonsinyasiP
        ];

        $updateProduk = Produk::findOrFail($id_produk);
        $updateProduk->update($dataProduk); 

        $data = Konsinyasi_Produk::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Konsumen Sudah dihapus');
        
    }
}
