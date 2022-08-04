<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiDetail = TransaksiDetail::all();
        return view('transaksiDetail.index', compact('transaksiDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        $transaksiDetail = TransaksiDetail::all();
        $transaksi = Transaksi::all();
        return view('transaksiDetail.create', compact('produk', 'transaksiDetail', 'transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TransaksiDetail::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'transaksi_id' => $request->transaksi_id
        ]);
        return redirect()->route('transaksiDetail.index')->with('success', 'berhasil menambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiDetail  $transaksiDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiDetail $transaksiDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiDetail  $transaksiDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiDetail $transaksiDetail)
    {
        $produk = Produk::all();
        $transaksi = Transaksi::all();
        return view('transaksiDetail.edit', compact('produk', 'transaksiDetail', 'transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaksiDetail  $transaksiDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiDetail $transaksiDetail)
    {
        $request->validate([
            'produk_id' => 'required',
            'jumlah' => 'required',
            'transaksi_id' => 'required'
        ]);
        $transaksiDetail->update($request->all());
        return redirect()->route('transaksiDetail.index')->with('success', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiDetail  $transaksiDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiDetail $transaksiDetail)
    {
        $transaksiDetail->delete();
        return redirect()->route('transaksiDetail.index')->with('success', 'berhasil hapus data');
    }
}
