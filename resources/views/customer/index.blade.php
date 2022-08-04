@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data customer</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('customer.create') }}"> Create</a>
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
                <th scope="col">nama lengkap</th>
                <th scope="col">no hp</th>
                <th scope="col">alamat lengkap</th>
                <th scope="col">opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($customer as $cus)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $cus->nama_lengkap }}</td>
                    <td>{{ $cus->no_hp }}</td>
                    <td>{{ $cus->alamat_lengkap }}</td>
                    <td>
                        <form action="{{ route('customer.destroy',$cus->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('customer.edit',$cus->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('mau hapus {{ $cus->nama_lengkap }}')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
