@extends('admin.main')

@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <h1 class="my-3">Barangku</h1>

          @if(session()->has('success'))
          <div class="alert alert-success col-10" role="alert">
            {{ session('success') }}
          </div>
          @endif

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
                  <th>Kode Pemesanan</th>
                  <th>Tanggal Pesanan</th>
                  <th>Jumlah Harga</th>
                  <th>Status</th>
                  <th>Detail</th>
                  <th>Hapus</th>
                  <th>Bayar</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pesanan as $p)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $p->kode }}</td>
                      <td>{{ $p->tanggal }}</td>
                      <td>{{ $p->jumlah_harga }}</td>
                      <td>{{ $p->status }}</td>
                      <td>
                          <a href="/showbarang/{{ $p->id }}">Detail</a>
                        {{-- <a href="/showProfile/{{ Crypt::encrypt($p->id) }}" class="btn btn-primary">Lihat Profile</a> --}}
                      </td>
                      <td>
                        <form action="/barangku/{{ $p->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0"  onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i>
                              <span data-feather="x-circle"></span></button>
                          </form>
                      </td>
                      <td>
                        @if($p->status == "Belum Bayar")
                          <form action="/barangku/{{ $p->id }}" method="post" class="d-inline">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="status" value="Lunas">
                            <button class="btn btn-primary"  onclick="return confirm('Apa anda mau membayar?')">Bayar</button>
                          </form>
                        @endif
                        @if($p->status == "Lunas")
                          <form action="/barangku/{{ $p->id }}" method="post" class="d-inline">
                            @method('put')
                            @csrf
                            <input type="hidden" name="status" value="Belum Bayar">
                            <button class="btn btn-primary"  onclick="return confirm('Apa anda mau membatalkan?')">Batal</button>
                          </form>
                        @endif
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