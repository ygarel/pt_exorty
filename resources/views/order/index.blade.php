@extends('layouts.template')

@section('content')

@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-success">{{ Session::get('deleted') }}</div>
@endif

<h1>Transaksi</h1>
    <a style="text-decoration: none" href="{{ route('home.page') }}">Home/</a>
    <a style="text-decoration: none" href="">Order</a>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a style="margin-bottom: 20px" class="btn btn-primary" href="{{ route('order.create') }}" role="button">Order</a>
    </div>
<table class="table">
    <thead>
      <tr>
        <th >No</th>
        <th >Nama</th>
        <th >Produk</th>
        <th >Jumlah Beli</th>
        <th >Total Harga</th>
        <th >Tanggal Pembelian</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @php $no= 1 @endphp
        @foreach ($orders as $order)    
            <td scope="row">{{ $no++ }}</td>
            <td>{{ $order['nama'] }}</td>
            <td>
                @foreach ($produks as $produk)
                    @if ($produk->id == $order->produk_id)
                        {{ $produk->produk }}
                    @endif
                @endforeach
            </td>

            <td>{{ $order['jumlah_beli'] }}</td>
            <td>{{ $order['ttl_harga'] }}</td>
            <td>{{ $order['tgl_pembelian'] }}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('order.edit', $order['id']) }}" class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('order.delete', $order['id']) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>    
@endsection
