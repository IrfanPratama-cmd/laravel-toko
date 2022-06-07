@extends('admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Kategori</h1>
  </div>
  <div class="col-lg-6">
      <form action="/kategori" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="category" class="form-label">Nama Kategori</label>
          <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="category" 
          name="kategori" value="{{ old('kategori') }}" required autofocus>
          @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>    
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Gambar Kategori</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('gambar_kategori') is-invalid @enderror" type="file" id="image" name="gambar_kategori" 
          onchange="previewImage()">
          @error('gambar_kategori')
          <div class="invalid-feedback">
              {{ $message }}
          </div> 
          @enderror
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
 </script>

@endsection