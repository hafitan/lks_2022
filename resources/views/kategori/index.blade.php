@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data kategori</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('kategori.create') }}"> Create</a>
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
                <th scope="col">nama kategori</th>
                <th scope="col">opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($kategori as $k)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $k->kategori }}</td>
                    <td>
                        <form action="{{ route('kategori.destroy',$k->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('kategori.edit',$k->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('mau hapus {{ $k->kategori }}')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
