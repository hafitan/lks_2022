@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add new</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
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

<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>produk</strong>
                <input type="text" name="produk" class="form-control" placeholder="produk">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>kategori</strong>
                {{-- <input type="text" name="kategori" class="form-control" placeholder="produk"> --}}
                <select name="kategori" id="" class="form-control">
                    <option value="">--pilih</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->kategori }}">{{ $kat->kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>deskripsi</strong>
                {{-- <input type="text" name="produk" class="form-control" placeholder="produk"> --}}
                <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>harga</strong>
                <input type="number" min=1 name="harga" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>jumlah</strong>
                <input type="number" min=1 name="jumlah" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="file" class="form-control" name="image" placeholder="Choose image" id="image">
            @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
