<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::paginate(5);
        $supplier = Supplier::all();
        return view('page.pembelian.index')->with([
            'pembelian' => $pembelian,
            'supplier' => $supplier
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::all();
        return view('page.pembelian.create')->with([
            'supplier' => $supplier,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_penjualan = date('YmdHis');
        $data = [
            'kode_pembelian' => $kode_penjualan,
            'tgl_pembelian' => $request->input('tgl_pembelian'),
            'id_supplier' => $request->input('id_supplier'),
            'id_user' => Auth::user()->id,
        ];

        Pembelian::create($data);

        return redirect()
            ->route('pembelian.index')
            ->with('message', 'Data sudah ditambahkan');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
