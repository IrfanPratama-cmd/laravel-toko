@extends('admin.main')

@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-8">
          <h1 class="my-3">Data Barang</h1>

          @if(session()->has('success'))
          <div class="alert alert-success col-10" role="alert">
            {{ session('success') }}
          </div>
          @endif

          <a href="/barang/create" class="btn btn-primary mb-3">Tambah Barang</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kategori</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($barang as $b)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $b->kategori->kategori }}</td>
                      <td>{{ $b->nama_barang }}</td>
                      <td>{{ number_format($b->harga)}}</td>
                      <td>{{ $b->stok }}</td>
                      <td>
                        <a href="/barang/{{ $b->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="/barang/{{ $b->id }}" method="post" class="d-inline">
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

{{ $barang->links() }}
    
@endsection