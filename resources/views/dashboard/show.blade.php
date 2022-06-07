@extends('layouts.main')


@section('container')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $barang->nama_barang }}</h2>
            <hr>

            <div style=" overflow:hidden;">
              @if($barang->gambar_barang)
                <img src="{{ asset('storage/' . $barang->gambar_barang) }}" class="img-fluid mt-3" style="width: 900px; height: 400px" alt="{{ $barang->kategori->kategori }}">
              @else
                <img src="https://source.unsplash.com/900x400/?{{ $barang->nama_barang }}" class="card-img-top">
              @endif
            </div>

            <hr>
            <h4 class="mt-3">Kategori : {{ $barang->kategori->kategori  }}</h4>
            <h5>Harga : Rp. {{ number_format($barang->harga) }}</h5>

            <article class="my-3">
              {!! $barang->keterangan !!} 
            </article>
            

            <a href="/" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
      