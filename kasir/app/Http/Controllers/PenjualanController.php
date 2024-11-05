<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penjualan::paginate(5);
        return view('page.penjualan.index')->with([
            'penjualan' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konsumen = Konsumen::all();
        return view('page.penjualan.create')->with([
            'konsumen' => $konsumen,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_penjualan = date('YmdHis');
        $data = [
            'kode_penjualan' => $kode_penjualan,
            'tgl_penjualan' => $request->input('tgl_penjualan'),
            'id_konsumen' => $request->input('id_konsumen'),
            'status_pembelian' => $request->input('status_pembelian'),
            'id_user' => Auth::user()->id,
        ];

        Penjualan::create($data);

        return redirect()
            ->route('penjualan.index')
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
