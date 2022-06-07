@extends('layouts.main')


@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mx-3">
      <div class="col-md-6">
        <form action="/homebarang">
          @if (request('kategori'))
            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit" >Search</button>
          </div>
        </form>
      </div>
    </div>

    @if ($barang->count())
    <div class="row mt-3">
      @foreach ($barang as $b)
      <div class="col-md-3 mb-3">
          <div class="card d-flex">
              @if($b->gambar_barang)
                <img src="{{ asset('storage/' . $b->gambar_barang) }}" class="img-fluid" style="heigt: 1200px; width:300px;" alt="...">
              @else
                <img src="https://source.unsplash.com/1200x800/?{{ $b->nama_barang }}" class="card-img-top">
              @endif
              <div class="card-body">
                <h4 class="card-title">{{ $b->nama_barang }}</h4>
                <h5 class="card-title">Kategori : {{ $b->kategori->kategori }}</h5>
                <p class="card-text">Harga : Rp. {{ number_format($b->harga) }}</p>
                <p class="card-text">Stok : {{ $b->stok }}</p>
                {{-- <p class="card-text">{{ $b->keterangan }}</p> --}}
                <a href="/showbarang/{{ Crypt::encrypt($b->id) }}" class="btn btn-primary">Lihat Barang</a>
                @if (auth()->user()->role == "User")
                  <a href="/pesan/{{ Crypt::encrypt($b->id) }}" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Pesan</a>
                @endif
              </div>
            </div>
      </div>
      @endforeach
    </div>

    @else
    <p class="text-center fs-4">Barang tidak ditemukan..</p>
    @endif

    {{ $barang->links() }}
    
@endsection
      