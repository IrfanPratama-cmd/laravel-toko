@extends('layouts.main')


@section('container')
    @auth
      <h1 class="mb-3 text-center">Selamat Datang, {{ auth()->user()->name }}</h1>
      @else
      <h1 class="mb-3 text-center">Selamat Datang di Joni Store</h1>
    @endauth

    <hr>

    <h2>Produk Unggulan Kami</h2>

    <hr>

    <div class="row mt-3">
        @foreach ($barang as $b)
        <div class="col-md-3 mb-3">
            <div class="card d-flex" style="width: 20rem;">
                <div class="card-body">
                @if($b->gambar_barang)
                  <img src="{{ asset('storage/' . $b->gambar_barang) }}" class="img-fluid" style="heigt: 350px; width:350px;" alt="...">
                @else
                  <img src="https://source.unsplash.com/1200x800/?{{ $b->nama_barang }}" class="card-img-top">
                @endif
                <h4 class="card-title">{{ $b->nama_barang }}</h4>
                  <h5 class="card-title">Kategori : {{ $b->kategori->kategori }}</h5>
                  <p class="card-text">Harga : Rp. {{ number_format($b->harga) }}</p>
                  <p class="card-text">Stok : {{ $b->stok }}</p>
                  {{-- <p class="card-text">{{ $b->keterangan }}</p> --}}
                  <a href="/showbarang/{{ Crypt::encrypt($b->id) }}" class="btn btn-primary">Lihat Barang</a>
                  @auth
                    @if (auth()->user()->role == "User")
                    <a href="/pesan/{{ Crypt::encrypt($b->id) }}" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Pesan</a>
                    @endif
                  @endauth
                </div>
              </div>
        </div>
        @endforeach
    </div>
@endsection
      