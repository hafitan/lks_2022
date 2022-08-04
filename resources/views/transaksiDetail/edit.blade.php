@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transaksiDetail.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksiDetail.update',$transaksiDetail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>produk</strong>
                    <select name="produk_id" class="form-control" id="" required>
                        <option value="">--pilih--</option>
                    @foreach ($transaksiDetail as $detail)
                        <option value="{{ $detail->nama_produk }}" @if($produk->produk_id == $detail->nama_produk)selected @endif>{{ $detail->nama_produk }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>transaksiDetail</strong>
                    <input type="text" name="nama_transaksiDetail" class="form-control" placeholder="nama transaksiDetail" value="{{$transaksiDetail->nama_transaksiDetail}}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
