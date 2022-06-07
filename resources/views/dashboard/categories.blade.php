@extends('layouts.main')


@section('container')
    <h1 class="mb-3 text-center">Kategori Barang</h1>
    <hr>

    <div class="container">
        <div class="row">
            @foreach ($kategori as $k)
            <div class="col-md-4 my-3">
                <a href="/homekategori/{{ Crypt::encrypt($k->id) }}">
                    <div class="card bg-dark text-white">
                        @if($k->gambar_kategori)
                            <img src="{{ asset('storage/' . $k->gambar_kategori) }}" class="img-fluid" style="heigt: 350px; width:350px;" alt="...">
                        @else
                            <img src="https://source.unsplash.com/500x500/?{{ $k->kategori }}" 
                            class="card-img" alt="{{ $k->kategori }}">
                        @endif
                       
                        <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3  " 
                        style="background-color: rgba(0, 0, 0, 0.7)">{{ $k->kategori }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    
@endsection
      