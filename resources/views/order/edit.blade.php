@extends ('layouts.template')

@section('content')

<h1>Edit Produk</h1>
    <a style="text-decoration: none" href="{{ route('home.page') }}">Home/</a>
    <a style="text-decoration: none" href="{{ route('order.index') }}">Order/</a>
    <a style="text-decoration: none" href="">Edit Data</a>
<form style=" margin-top: 50px;" action="{{ route('order.update', $orders['id'])}}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')

    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input value="{{ $orders['nama'] }}" type="text" class="form-control" id="nama" name="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="produk_id" class="col-sm-2 col-form-label">Ganti Makanan</label>
        <div class="col-sm-10">
            <select class="form-control" name="produk_id" id="produk_id">
                    <option value="">Pilih Menu</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk['id'] }}">{{ $produk['produk'] }}</option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jumlah_beli" class="col-sm-2 col-form-label">Jumlah Beli</label>
        <div class="col-sm-10">
            <input value="{{ $orders['jumlah_beli'] }}" type="text" class="form-control" id="jumlah_beli" name="jumlah_beli">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tgl_pembelian" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            <input value="{{ $orders['tgl_pembelian'] }}" type="date" class="form-control" id="jumlah" name="jumlah">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection