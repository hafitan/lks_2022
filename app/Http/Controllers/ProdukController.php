<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Photo;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        // dd($produk);
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('produk.create', compact('produk', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'kategori_id'     => 'required',
            'deskripsi'   => 'required',
            'harga'   => 'required',
            'nama_produk'   => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        // dd($image->getClientOriginalName());
        $image->move('public/image', $image->getClientOriginalName());

        $blog = Produk::create([
            'gambar'     => $image->getClientOriginalName(),
            'kategori_id'     => $request->kategori_id,
            'deskripsi'   => $request->deskripsi,
            'harga'   => $request->harga,
            'nama_produk'   => $request->nama_produk,
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('produk.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'kategori_id'     => 'required',
            'deskripsi'   => 'required',
            'harga'   => 'required',
            'nama_produk'   => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        // dd($image->getClientOriginalName());
        $image->move('public/image', $image->getClientOriginalName());

        $blog = $produk->update([
            'gambar'     => $image->getClientOriginalName(),
            'kategori_id'     => $request->kategori_id,
            'deskripsi'   => $request->deskripsi,
            'harga'   => $request->harga,
            'nama_produk'   => $request->nama_produk,
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('produk.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'berhasil menghapus data');
    }
}
