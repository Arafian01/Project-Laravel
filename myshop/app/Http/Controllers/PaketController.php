<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = paket::paginate(5);
        $outlet = Outlet::all();
        return view('page.paket.index')->with([
            'paket' => $paket,
            'outlet' => $outlet
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
            'id_outlet' => $request->input('id_outlet'),
            'jenis' => $request->input('jenis'),
            'nama_paket' => $request->input('nama_paket'),
            'harga' => $request->input('harga'),
        ];

        paket::create($data);

        return back()->with('message', 'Data Paket Berhasil Disimpan!');
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
            'id_outlet' => $request->input('id_outlet_edit'),
            'jenis' => $request->input('jenis'),
            'nama_paket' => $request->input('nama_paket'),
            'harga' => $request->input('harga'),
        ];

        $datas = paket::findOrFail($id);
        $datas->update($data);
        return back()->with('message_update', 'Data Paket Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = paket::findOrFail($id);

            if ($data) {
                $data->delete();
            }

            return response()->json([
                'message_delete' => "Data Paket Sudah dihapus"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete data.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getPaket($id)
    {
        $paket = paket::where('id', $id)->first();

        return $paket
            ? response()->json(['paket' => $paket])
            : response()->json(['message' => 'paket tidak ditemukan'], 404);
    }
}
