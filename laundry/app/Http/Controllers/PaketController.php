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
        ];

        paket::create($data);

        return back()->with('message_delete', 'Data Paket Sudah dihapus');
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
        ];

        $datas = paket::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Paket Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = paket::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data paket Sudah dihapus');
    }
}
