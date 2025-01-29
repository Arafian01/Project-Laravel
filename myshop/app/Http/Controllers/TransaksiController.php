<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::paginate(5);
        $outlet = Outlet::all();
        $member = Member::all();
        $user = User::all();
        return view('page.transaksi.index')->with([
            'transaksi' => $transaksi,
            'outlet' => $outlet,
            'member' => $member,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $member = Member::all();
        $outlet = Outlet::all();
        $paket = Paket::all();
        $user = User::all();
        $kodeInovice = Transaksi::createCode();
        return view('page.transaksi.create', compact('kodeInovice'))->with([
            'member' => $member,
            'outlet' => $outlet,
            'paket' => $paket,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kodeInovice = $request->input('kode_invoice');

        $paket = $request->input('paket', []);
        foreach ($paket as $index => $p) {

            $dataDetail = [
                'id_transaksi' => $kodeInovice,
                'id_paket' => $p,
                'qty' => $request->qty[$index],
                'keterangan' => $request->keterangan[$index],
            ];
            Detail_Transaksi::create($dataDetail);
        }

        $data = [
            'id_outlet' => $request->input('id_outlet'),
            'kode_invoice' => $request->input('kode_invoice'),
            'id_member' => $request->input('id_member'),
            'tanggal' => $request->input('tgl'),
            'batas_waktu' => $request->input('batas_waktu'),
            'tgl_bayar' => null,
            'biaya_tambahan' => $request->input('biaya_tambahan'),
            'diskon' => $request->input('diskon'),
            'pajak' => $request->input('pajak'),
            'status' => $request->input('status'),
            'dibayar' => 'belum dibayar',
            'id_user' => Auth::user()->id,
            'total_bayar' => $request->input('total_bayar')
        ];

        Transaksi::create($data);

        return redirect()
            ->route('transaksi.index')
            ->with('message', 'Data Berhasil ditambahkan');
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
        // $dibayar = $request->input('dibayar');

        // // Menentukan data yang akan diupdate
        // $data = [
        //     'tgl_bayar' => $dibayar === "dibayar" ? date('Y-m-d') : null,
        //     'dibayar' => $dibayar,
        // ];

        // $datas = Transaksi::findOrFail($id);
        // $datas->update($data);

        // Temukan transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id);

    // Update status dibayar
    if ($transaksi->dibayar === 'belum dibayar') {
        $data = [
            'dibayar' => 'dibayar',
            'tgl_bayar' => date('Y-m-d'),
        ];
        $transaksi->update($data);

        // Mengembalikan respons JSON jika berhasil
        return response()->json(['success' => true, 'message' => 'Status pembayaran berhasil diupdate.']);
    }

    // Jika status sudah 'dibayar', kembalikan pesan yang sesuai
    return response()->json(['success' => false, 'message' => 'Status sudah dibayar, tidak perlu diupdate.'], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $id_invoice = $transaksi->kode_invoice;

        // Hapus detail penjualan dan data penjualan
        Detail_Transaksi::where('id_transaksi', $id_invoice)->delete();
        $transaksi->delete();

        return back()->with('message_delete', 'Data Transaksi berhasil dihapus.');
    }
}
