@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data transaksi</h2>
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
                <th scope="col">customer</th>
                <th scope="col">kode transaksi</th>
                <th scope="col">jumlah</th>
                <th scope="col">harga</th>
                <th scope="col">tanggal</th>
                <th scope="col">opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($transaksi as $tran)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $tran->customer_id }}</td>
                    <td>{{ $tran->kode_transaksi }}</td>
                    <td>{{ $tran->jumlah }}</td>
                    <td>{{ $tran->harga }}</td>
                    <td>{{ $tran->tanggal }}</td>
                    <td>
                        <form action="{{ route('transaksi.destroy',$tran->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('transaksi.edit',$tran->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('mau hapus {{ $tran->customer_id }}')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
