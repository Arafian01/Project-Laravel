<?php

namespace App\Http\Controllers;

use App\Models\Konsinyasi;
use Illuminate\Http\Request;

class KonsinyasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsinyasi = Konsinyasi::paginate(5);
        return view ('page.konsinyasi.index')->with([
            'konsinyasi' => $konsinyasi
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
            'konsinyasi' => $request->input('konsinyasi'),
        ];

        Konsinyasi::create($data);

        return back()->with('message_delete', 'Data Konsinyasi Sudah Di hapus');
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
            'konsinyasi' => $request->input('konsinyasi'),
        ];

        $datas = Konsinyasi::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Konsinyasi sudah di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Konsinyasi::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', "Data Konsinyasi telah di hapus");
    }
}
