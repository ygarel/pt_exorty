@extends ('layouts.template')

@section('content')

<h1>Tambah Produk</h1>
    <a style="text-decoration: none" href="{{ route('home.page') }}">Home/</a>
    <a style="text-decoration: none" href="{{ route('produk.index') }}">Produk/</a>
    <a style="text-decoration: none" href="">Tambah Data</a>
<form style=" margin-top: 50px;" action="{{ route('produk.store')}}" method="POST" class="card p-5">
    @csrf

    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="mb-3 row">
        <label for="produk" class="col-sm-2 col-form-label">Pilih Makanan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="produk" name="produk">
            {{-- <select class="form-control" name="produk" id="produk">
                    <option value="">Pilih Menu</option>
                    <option value="">Mie Ayam</option>
                    <option value="">Bakso</option>
                    <option value="">Soto Ayam</option>
            </select> --}}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah" name="jumlah">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection