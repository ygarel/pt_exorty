@extends ('layouts.template')

@section('content')

<h1>Tambah Produk</h1>
    <a style="text-decoration: none" href="{{ route('home.page') }}">Home/</a>
    <a style="text-decoration: none" href="{{ route('produk.index') }}">Produk/</a>
    <a style="text-decoration: none" href="">Edit Data</a>
<form style=" margin-top: 50px;" action="{{ route('produk.update', $produks['id'])}}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="mb-3 row">
        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah" name="jumlah">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection