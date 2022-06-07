@extends('admin.main')

@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <h1 class="my-3">Data User</h1>

          @if(session()->has('success'))
          <div class="alert alert-success col-10" role="alert">
            {{ session('success') }}
          </div>
          @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama User</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>No. Telp</th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($user as $u)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $u->name }}</td>
                      <td>{{ $u->role }}</td>
                      <td>{{ $u->email }}</td>
                      <td>{{ $u->alamat }}</td>
                      <td>{{ $u->no_hp }}</td>

                      <td>
                        <a href="/showProfile/{{ Crypt::encrypt($u->id) }}" class="btn btn-primary">Lihat Profile</a>
                      </td>
                    </tr>
                  @endforeach  
                </tfoot>
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
    
@endsection