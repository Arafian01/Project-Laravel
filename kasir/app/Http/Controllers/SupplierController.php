<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('page.supplier.index')->with([
            'supplier' => $supplier
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
            'supplier' => $request->input('supplier'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
        ];

        Supplier::create($data);

        return back()->with('message_delete', 'Data Supplier Sudah dihapus');
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
            'supplier' => $request->input('supplier'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
        ];

        $datas = Supplier::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Supplier Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Supplier::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Supplier Sudah dihapus');
    }
}
