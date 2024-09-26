<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsumen = Konsumen::paginate(5);
        return view('page.konsumen.index')->with([
            'konsumen' => $konsumen
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
            'konsumen' => $request->input('konsumen'),
            'status' => $request->input('status'),
        ];

        Konsumen::create($data);

        return back()->with('message_delete', 'Data Konsumen Sudah dihapus');
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
            'konsumen' => $request->input('konsumen'),
            'status' => $request->input('status'),
        ];

        $datas = Konsumen::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Konsumen Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Konsumen::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Konsumen Sudah dihapus');
    }
}
