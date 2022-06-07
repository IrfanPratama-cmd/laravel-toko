@extends('admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Barang</h1>
  </div>
  <div class="col-lg-6">
      <form action="/barang/{{ $barang->id }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Barang</label>
          <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama" 
          name="nama_barang" value="{{ $barang->nama_barang }}" required autofocus>
          @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>    
          @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori Barang</label>
            <select class="form-control" name="kategori_id">
                <option selected disabled>Pilih Kategori</option>
                @foreach ($kategori as $k)
                @if(old('kategori_id', $barang->kategori_id) == $k->id)
                    <option value="{{ $k->id }}" selected>{{ $k->kategori }}</option>
                @else
                    <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="nama" 
            name="harga" value="{{ $barang->harga }}" required autofocus>
            @error('harga')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>    
            @enderror
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Stok</label>
          <input type="number" class="form-control @error('stok') is-invalid @enderror" id="nama" 
          name="stok" value="{{ $barang->stok }}" required autofocus>
          @error('stok')
            <div class="invalid-feedback">
                {{ $message }}
            </div>    
          @enderror
      </div>
      <div class="mb-3">
          <label for="image" class="form-label">Gambar Barang</label>
          <input type="hidden" name="oldImage" value="{{ $barang->gambar_barang }}">
          @if ($barang->gambar_barang)
            <img src="{{ asset('storage/' . $barang->gambar_barang) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block ">
          @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif
          <input class="form-control @error('gambar_barang') is-invalid @enderror" type="file" id="gambar_barang" name="gambar_barang" 
          onchange="previewImage()">
          @error('gambar_barang')
          <div class="invalid-feedback">
              {{ $message }}
          </div>    
          @enderror
      </div>
      <div class="mb-3">
        <select class="form-control" name="status" aria-label="Default select example">
          <option selected>Status Barang</option>
          <option value="0">Biasa</option>
          <option value="1">Reccomended</option>
          <option value="2">Favorit</option>
        </select>
      </div>
      <div class="mb-3">
          <label for="keterangan" class="form-label">Keterangan</label>
          @error('keterangan')
          <p class="text-danger">{{ $message }}</p>    
          @enderror
          <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan', $barang->keterangan) }}">
          <trix-editor input="keterangan"></trix-editor>
      </div>
        <button type="submit" class="btn btn-primary">Edit Data</button>
      </form>
  </div>

  <script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }

      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      })
  </script>

@endsection