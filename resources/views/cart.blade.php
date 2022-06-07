@extends('layouts.main')


@section('container')

<h1>Daftar Keranjang</h1>
<hr>

<form action="/pesanan" method="post">
    @csrf
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Barang</th>
            <th style="width:10%">Harga</th>
            <th style="width:8%">Jumlah</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)    
                @php $total += $details['harga'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('storage/' . $details['gambar_barang']) }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['nama_barang'] }}</h4>
                                <input type="hidden" name="barang" value="{{ $details['nama_barang'] }}">
                            </div>
                        </div>
                    </td>
                    <td data-th="Harga">Rp. {{ number_format($details['harga'])  }}</td>
                    <input type="hidden" name="harga" value="{{ number_format($details['harga'])  }}">
                    {{-- @if($details['quantity'] > $details['stok'])
                    <div class="invalid-feedback">
                        Jumlah melebihi batas stok
                    </div>  
                    @else
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                            <input type="hidden" name="jumlah" value="{{ $details['quantity'] }}" class="form-control quantity update-cart">
                        </td>
                    @endif --}}
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        <input type="hidden" name="jumlah" value="{{ $details['quantity'] }}" class="form-control quantity update-cart">
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp.{{ number_format($details['harga'] * $details['quantity']) }}</td>
                    <input type="hidden" name="jumlah_harga" value="{{ number_format($total) }}">
                    <td class="actions" data-th="">
                        <button class="btn btn-danger remove-cart"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total Rp. {{ number_format($total) }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="/homebarang" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                {{-- <a href="/pesanan" class="btn btn-success">Checkout</a> --}}
                <button type="submit" class="btn btn-success">Checkout</button>                              
            </td>
        </tr>
    </tfoot>
</table>
</form>
<br><br><br>
@endsection
  
@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Apa anda yakin mau menghapus?")) {
            $.ajax({
                url: '{{ route('remove.cart') }}',
                method: "delete",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection
      