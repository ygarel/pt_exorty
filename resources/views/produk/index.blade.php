@extends('layouts.template')

@section('content')

@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-success">{{ Session::get('deleted') }}</div>
@endif

<h1>Produk</h1>
    <a style="text-decoration: none" href="{{ route('home.page') }}">Home/</a>
    <a style="text-decoration: none" href="">Produk</a>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a style="margin-bottom: 20px" class="btn btn-primary" href="{{ route('produk.create') }}" role="button">Tambah Produk</a>
    </div>
<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @php $no= 1 @endphp
        @foreach ($produks as $produk)    
            <td>{{ $no++ }}</td>
            <td>{{ $produk['produk'] }}</td>
            <td>{{ $produk['jumlah'] }}</td>
            <td>
                @php
                    $harga = 0;
            
                    if ($produk['produk'] == 'Mie Ayam') {
                        $harga = 15000;
                    } elseif ($produk['produk'] == 'Bakso') {
                        $harga = 20000;
                    } elseif ($produk['produk'] == 'Soto Ayam') {
                        $harga = 12000;
                    }
                @endphp
            
                {{ $harga }}
            </td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('produk.edit', $produk['id']) }}" class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('produk.delete', $produk['id']) }}" method="post">
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