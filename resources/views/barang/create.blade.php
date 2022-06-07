@extends('admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Barang</h1>
  </div>
  <div class="col-lg-6">
      <form action="/barang" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Barang</label>
          <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama" 
          name="nama_barang" value="{{ old('nama_barang') }}" required autofocus>
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
                @if(old('id_category') == $k->id)
                    <option value="{{ $k->id}}" selected>{{ $k->kategori }}</option>
                @else
                    <option value="{{ $k->id}}">{{ $k->kategori }}</option>
                @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="nama" 
            name="harga" value="{{ old('harga') }}" required autofocus>
            @error('harga')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>    
            @enderror
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Stok</label>
          <input type="number" class="form-control @error('stok') is-invalid @enderror" id="nama" 
          name="stok" value="{{ old('stok') }}" required autofocus>
          @error('stok')
            <div class="invalid-feedback">
                {{ $message }}
            </div>    
          @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Gambar Barang</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control @error('gambar_barang') is-invalid @enderror" type="file" id="image" name="gambar_barang" 
        onchange="previewImage()">
        @error('gambar_barang')
        <div class="invalid-feedback">
            {{ $message }}
        </div>    
      @enderror
      </div>
      <div class="mb-3">
          <label for="keterangan" class="form-label">Keterangan</label>
          @error('keterangan')
          <p class="text-danger">{{ $message }}</p>    
          @enderror
          <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan') }}">
          <trix-editor input="keterangan"></trix-editor>
      </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
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