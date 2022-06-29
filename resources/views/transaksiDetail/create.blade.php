@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add new</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('transaksiDetail.index') }}"> Back</a>
        </div>
    </div>
</div>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Sepertinya ada masalah pada inputan anda<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('transaksiDetail.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>produk</strong>
                {{-- <input type="text" name="produk_id" class="form-control" placeholder="produ" required> --}}
                <select name="produk_id" class="form-control" id="">
                    <option value="">-- Pilih --</option>
                    @foreach ($produk as $prod)
                        <option value="{{ $prod->nama_produk }}">{{ $prod->nama_produk }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>jumlah</strong>
                <input type="number" min=1 name="jumlah" class="form-control" placeholder="jumlah" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>kode transaksi</strong>
                {{-- <input type="text" name="produk_id" class="form-control" placeholder="produ" required> --}}
                <select name="transaksi_id" class="form-control" id="">
                    <option value="">-- Pilih --</option>
                    @foreach ($transaksi as $tran)
                        <option value="{{ $tran->kode_transaksi }}">{{ $tran->kode_transaksi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
