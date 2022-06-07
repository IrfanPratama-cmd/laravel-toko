@extends('admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profile</h1>
  </div>
  <div class="col-lg-6">
    @foreach ($user as $u)
      <form action="/profile/{{ $u->id }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama User</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
          name="name" value="{{ $u->name }}" required autofocus>
          @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>    
          @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" 
            name="alamat" value="{{ $u->alamat }}" required autofocus>
            @error('alamat')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" 
            name="no_hp" value="{{ $u->no_hp }}" required autofocus>
            @error('no_hp')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>    
            @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Gambar Profile</label>
          <input type="hidden" name="oldImage" value="{{ $u->gambar_profile }}">
          @if ($u->gambar_profile)
            <img src="{{ asset('storage/' . $u->gambar_profile) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block ">
          @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif
          <input class="form-control @error('gambar_profile') is-invalid @enderror" type="file" id="gambar_profile" name="gambar_profile" 
          onchange="previewImage()">
          @error('gambar_profile')
          <div class="invalid-feedback">
              {{ $message }}
          </div>    
          @enderror
      </div>
        <button type="submit" class="btn btn-primary">Edit Data</button>
      </form>
      @endforeach  
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