@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add new</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('transaksi.index') }}"> Back</a>
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

<form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>customer</strong>
                {{-- <input type="text" name="nama_transaksi" class="form-control" placeholder="nama_transaksi" required> --}}
                <select  name="customer_id" class="form-control" id="" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($customer as $cus)
                        <option value="{{ $cus->nama_lengkap }}">{{ $cus->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>kode transaksi</strong>
                <input type="text" name="kode_transaksi" class="form-control" placeholder="kode_transaksi" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
