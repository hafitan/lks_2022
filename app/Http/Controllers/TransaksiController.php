<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Customer;
use App\Models\Produk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $transaksi = Transaksi::all();
        $prod = Produk::all();
        return view('transaksi.create', compact('customer', 'transaksi', 'prod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = Produk::find($request->prod_id);
        // dd($request->all());
        if($prod->jumlah < $request->jumlah){
            return redirect()->back()->with('danger', 'barang tidak cukup');

        }

        Transaksi::create([
            'customer_id' => $request->customer_id,
            'tanggal' => Carbon::now(),
            'produk' => $request->produk,
            'kode_transaksi' => $request->kode_transaksi,
            'jumlah' => $request->jumlah,
            'harga' => $request->jumlah * $prod->harga
        ]);

        $update = Produk::find($request->prod_id)->update([
            'jumlah' => $prod->jumlah - $request->jumlah
        ]);
        return redirect()->route('transaksi.index')->with('success', 'berhasil menambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'customer_id' => 'required',
            'kode_transaksi' =>'required'
        ]);
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index')->with('success', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'berhasil menghapus data');
    }
}
