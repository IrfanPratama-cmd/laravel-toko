@extends('admin.main')

@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-6">
          <h1 class="my-3">Profile User</h1>

          @foreach ($user as $u)

          @if(session()->has('success'))
          <div class="alert alert-success col-10" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <div class="card">
            <div class="card-header">
              {{-- <h3 class="card-title">Profile User</h3> --}}
              <a href="/profile/{{ $u->id }}/edit" class="btn btn-primary">Edit Profile</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <img src="{{ asset('storage/' . $u->gambar_profile) }}" class="img-fluid" style="height: 250px; width:220px; display:block; margin-left: auto;
                margin-right: auto;" alt="...">
                    
                <table class="table table-bordered table-hover my-3">
                    <thead>
                    <tr>
                      <th>Nama</th>
                      <td>{{ $u->name }}</td>
                    </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ $u->email }}</td>
                      </tr>
                      <tr>
                        <th>No. Hp</th>
                        <td>{{ $u->no_hp }}</td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td>{{ $u->alamat }}</td>
                      </tr>
                    </thead>
                  </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          @endforeach  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    
@endsection