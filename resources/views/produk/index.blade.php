@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produk.create') }}"> Create</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">nama produk</th>
                    <th scope="col">kategori</th>
                    <th scope="col">deskripsi</th>
                    <th scope="col">harga</th>
                    <th scope="col">gambar</th>
                    <th scope="col">opsi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($produk as $pro)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $pro->nama_produk }}</td>
                        <td>{{ $pro->kategori_id }}</td>
                        <td>{{ $pro->deskripsi }}</td>
                        <td>{{ $pro->harga }}</td>
                        <td><img src="{{asset('public/image/'.$pro->gambar)}}" style="max-height: 150px; max-width: 150px;" ></td>
                        <td>
                            <form action="{{ route('produk.destroy',$pro->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('produk.edit',$pro->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('mau hapus {{ $pro->nama_produk }}')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
