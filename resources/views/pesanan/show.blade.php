@extends('admin.main')

@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <h1 class="my-3">Detail Pesanan</h1>

          @if(session()->has('success'))
          <div class="alert alert-success col-10" role="alert">
            {{ session('success') }}
          </div>
          @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Detail Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{-- @foreach ($detail as $d)
                <div class="col-md-3 mb-3">
                    <div class="card d-flex">
                        @if($d->barang->gambar_barang)
                          <img src="{{ asset('storage/' . $d->barang->gambar_barang) }}" class="img-fluid" style="heigt: 1200px; width:300px;" alt="...">
                        @else
                          <img src="https://source.unsplash.com/1200x800/?{{ $d->barang->nama_barang }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                          <h4 class="card-title">{{ $d->barang->nama_barang }}</h4>
                          <h5 class="card-title">Kategori : {{ $d->barang->kategori->kategori }}</h5>
                          <p class="card-text">Jumlah : {{ $d->jumlah }}</p>
                          <p class="card-text">Harga : Rp. {{ number_format($d->harga) }}</p>
                          <p class="card-text">{{ $b->keterangan }}</p>
                        </div>
                      </div>
                </div>
                @endforeach --}}

                <div class="col-md-3 mb-3">
                    <div class="card d-flex">
                        @if($detail->barang->gambar_barang)
                          <img src="{{ asset('storage/' . $detail->barang->gambar_barang) }}" class="img-fluid" style="heigt: 1200px; width:300px;" alt="...">
                        @else
                          <img src="https://source.unsplash.com/1200x800/?{{ $detail->barang->nama_barang }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                          <h4 class="card-title">{{ $detail->barang->nama_barang }}</h4>
                          <h5 class="card-title">Kategori : {{ $detail->barang->kategori->kategori }}</h5>
                          <p class="card-text">Jumlah : {{ $detail->jumlah }}</p>
                          <p class="card-text">Harga : Rp. {{ $detail->harga }}</p>
                          {{-- <p class="card-text">{{ $b->keterangan }}</p> --}}
                        </div>
                      </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
    
@endsection