@extends('admin.main')

@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-6">
          <h1 class="my-3">Detail User</h1>

          @if(session()->has('success'))
          <div class="alert alert-success col-10" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <img src="{{ asset('storage/' . $user->gambar_profile) }}" class="img-fluid" style="height: 250px; width:220px; display:block; margin-left: auto;
                margin-right: auto;" alt="...">
                    
                <table class="table table-bordered table-hover my-3">
                    <thead>
                    <tr>
                      <th>Nama</th>
                      <td>{{ $user->name }}</td>
                    </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <th>No. Hp</th>
                        <td>{{ $user->no_hp }}</td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td>{{ $user->alamat }}</td>
                      </tr>
                    </thead>
                  </table>
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