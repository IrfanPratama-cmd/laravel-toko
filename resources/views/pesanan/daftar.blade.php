@extends('admin.main')

@section('container')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <h1 class="my-3">Daftar Pesanan</h1>

          @if(session()->has('success'))
          <div class="alert alert-success col-10" role="alert">
            {{ session('success') }}
          </div>
          @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Pemesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Pemesan</th>
                  <th>Kode Pemesanan</th>
                  <th>Tanggal Pesanan</th>
                  <th>Jumlah Harga</th>
                  <th>Status</th>
                  <th>Detail</th>
                  <th>Kirim</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pesanan as $p)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $p->user->name }}</td>
                      <td>{{ $p->kode }}</td>
                      <td>{{ $p->tanggal }}</td>
                      <td>{{ $p->jumlah_harga }}</td>
                      <td>{{ $p->status }}</td>
                      <td>
                          <a href="#">Detail</a>
                        {{-- <a href="/showProfile/{{ Crypt::encrypt($p->id) }}" class="btn btn-primary">Lihat Profile</a> --}}
                      </td>
                      <td>
                        @if($p->status == "Lunas")
                          <form action="/daftar-pesanan/{{ $p->id }}" method="post" class="d-inline">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="status" value="Dikirim">
                            <button class="btn btn-primary"  onclick="return confirm('Apa anda mau mengirim barang?')">Kirim</button>
                          </form>
                        @elseif($p->status == "Dikirim")
                          <form action="/daftar-pesanan/{{ $p->id }}" method="post" class="d-inline">
                            @method('put')
                            @csrf
                            <input type="hidden" name="status" value="Lunas">
                            <button class="btn btn-primary"  onclick="return confirm('Apa anda mau mengirim barang?')">Batal</button>
                          </form>
                        @else
                          Belum Lunas
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