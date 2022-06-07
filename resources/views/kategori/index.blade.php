@extends('admin.main')

@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-8">
          <h1 class="my-3">Data Kategori Barang</h1>

          @if(session()->has('success'))
          <div class="alert alert-success col-10" role="alert">
            {{ session('success') }}
          </div>
          @endif

          <a href="/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Kategori</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($kategori as $k)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $k->kategori }}</td>
                      <td>
                        <a href="/kategori/{{ $k->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="/kategori/{{ $k->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger border-0"  onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i>
                            <span data-feather="x-circle"></span></button>
                        </form>
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