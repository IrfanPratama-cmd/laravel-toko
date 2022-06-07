@extends('admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kategori</h1>
  </div>
  <div class="col-lg-6">
      <form action="/kategori/{{ $kategori->id }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="category" class="form-label">Nama Kategori</label>
          <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="category" 
          name="kategori" value="{{ $kategori->kategori }}" required autofocus>
          @error('category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>    
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Gambar Kategori</label>
          <input type="hidden" name="oldImage" value="{{ $kategori->gambar_kategori }}">
          @if ($kategori->gambar_kategori)
            <img src="{{ asset('storage/' . $kategori->gambar_kategori) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block ">
          @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif
          <input class="form-control @error('gambar_kategori') is-invalid @enderror" type="file" id="gambar_kategori" name="gambar_kategori" 
          onchange="previewImage()">
          @error('gambar_kategori')
          <div class="invalid-feedback">
              {{ $message }}
          </div>    
          @enderror
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
  </script>

@endsection