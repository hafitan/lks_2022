@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data transaksi detail</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('transaksiDetail.create') }}"> Create</a>
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
                <th scope="col">jumlah</th>
                <th scope="col">id transaksi</th>
                <th scope="col">opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($transaksiDetail as $detail)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $detail->produk_id }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>{{ $detail->transaksi_id }}</td>
                    <td>
                        <form action="{{ route('transaksiDetail.destroy',$detail->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('transaksiDetail.edit',$detail->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('mau hapus {{ $detail->nama_transaksiDetail }}')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
