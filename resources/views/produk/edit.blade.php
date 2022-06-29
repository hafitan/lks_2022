@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
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

    <form action="{{ route('produk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>produk</strong>
                    <input type="text" name="nama_produk" class="form-control" placeholder="nama produk" value="{{$produk->nama_produk}}" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>kategori</strong>
                    <select name="kategori_id" class="form-control" id="" required>
                        <option value="">--pilih--</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->nama_kategori }}" @if($produk->kategori_id == $kat->nama_kategori)selected @endif>{{ $kat->nama_kategori }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi</strong>
                    {{-- <input type="text" name="nama_produk" class="form-control" placeholder="nama produk" value="{{$produk->nama_produk}}" required> --}}
                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10">{{ $produk->deskripsi }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>harga</strong>
                    <input type="number" min=1 name="harga" class="form-control" placeholder="harga" value="{{$produk->harga}}" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="file" class="form-control" name="image" value="{{asset('public/image/'.$produk->gambar)}}"  placeholder="Choose image" id="image" >
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
