<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', auth()->user()->id)->get();
        return view('pesanan.index', [
            'pesanan' => $pesanan
        ]);
    }


    // public function pesanan(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'jumlah_harga' => 'required'
    //     ]);

    //     $validatedData['user_id'] = auth()->user()->id;
    //     $validatedData['tanggal'] = Carbon::now();

    //     Pesanan::create($validatedData);

    //     $detailPesanan = $request->validate([
    //         'jumlah' => 'required',
    //         'jumlah_harga' => 'required'
    //     ]);


    //     foreach($request->id)

    //     $pesanan = DB::table('pesanan_details')->get()->toArray();
    //     $objectToArray = (array)$pesanan;
    //     $get1 = $objectToArray[0];
    //     $get2 = (array)$get1;
    //     $pesanan_id = $get2['id'];

    //     $getbarang = DB::table('barangs')->select('id')->get()->toArray();
    //     $objectToArray = (array)$getbarang;
    //     $get1 = $objectToArray[0];
    //     $get2 = (array)$get1;
    //     $barang_id = $get2['id'];

    //     $detailPesanan['pesanan_id'] = $pesanan_id;
    //     $detailPesanan['barang_id'] = $barang_id;

    //     PesananDetail::create($detailPesanan);

    //     return redirect('/barangku')->with('success', 'Checkout Berhasil!');
    // }

    public function pesanan(Request $request)
    {
        // dd($request);

        $validate = Validator::make($request->all(), [
            'jumlah_harga' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect('/cart')->with('success', 'Checkout Gagal!');
        } else {

            // $cart = session()->get('cart');

            $jumlah_harga = $request->jumlah_harga;
            $user_id = auth()->user()->id;
            $tanggal = Carbon::now();
            $kode = "P" . mt_rand(1000, 9999);

            $pesanan = new Pesanan();
            $pesanan->jumlah_harga = $jumlah_harga;
            $pesanan->user_id = $user_id;
            $pesanan->kode = $kode;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = "Belum Bayar";
            $pesanan->save();

            // $pesanan = DB::table('pesanan_details')->get()->toArray();
            // $objectToArray = (array)$pesanan;
            // $get1 = $objectToArray[0];
            // $get2 = (array)$get1;
            // $pesanan_id = $get2['id'];

            // $getbarang = DB::table('barangs')->select('id')->get()->toArray();
            // $objectToArray = (array)$getbarang;
            // $get1 = $objectToArray[0];
            // $get2 = (array)$get1;
            // $barang_id = $get2['id'];

            $jumlah = $request->jumlah;
            // $harga = $request->harga;
            // $barang = $request->id;

            // $cart = session()->get('cart', []);

            // $id = $request->id;

            // $barang = Barang::findOrFail($id);


            // foreach ($request->$cart[$id] as $key) {
            //     $detail = new PesananDetail();
            //     $detail->barang_id = $barang->id;
            //     $detail->kode = $kode;
            //     $detail->jumlah = $request->quantity[$key];
            //     $detail->harga = $request->harga[$key];

            //     $detail->save();
            // }

            // if ($request->id) {
            //     $cart = session()->get('cart');
            //     $detail = new PesananDetail();
            //     $detail->barang_id = $cart[$request->id];
            //     $detail->kode = $kode;
            //     $detail->jumlah = $cart[$request->quantity];
            //     $detail->harga =  $cart[$request->harga];

            //     $detail->save();
            // }

            // $cart = session()->get('cart');
            // $detail = new PesananDetail();
            // $detail->barang_id = $cart[$request->id];
            // $detail->kode = $kode;
            // $detail->jumlah = $cart[$request->quantity];
            // $detail->harga =  $cart[$request->harga];

            // $detail->save();


            $detail = new PesananDetail();
            $detail->barang_id = $request->id;
            $detail->kode = $kode;
            $detail->jumlah = $jumlah;
            $detail->harga = $request->harga;

            $detail->save();

            return redirect('/barangku')->with('success', 'Checkout Berhasil!');
        }
    }

    public function destroy($id)
    {
        $data = Pesanan::findOrFail($id);
        $data->delete();

        

        return redirect('/barangku')->with('success', 'Pesanan Berhasil di Hapus');
    }

    public function daftarpesanan()
    {
        return view('pesanan.daftar', [
            'pesanan' => Pesanan::all()
        ]);
    }

    public function bayar(Request $request, $id)
    {
        $rules = [
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Pesanan::where('id', $id)->update($validatedData);

        return redirect('/barangku')->with('success', 'Pembayaran Berhasil!');
    }

    public function batal(Request $request, $id)
    {
        $rules = [
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Pesanan::where('id', $id)->update($validatedData);

        return redirect('/barangku')->with('success', 'Pembayaran Dibatalkan!');
    }

    public function kirim(Request $request, $id)
    {
        $rules = [
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Pesanan::where('id', $id)->update($validatedData);

        return redirect('/daftar-pesanan')->with('success', 'Barang Dikirim!');
    }

    public function batalKirim(Request $request, $id)
    {
        $rules = [
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Pesanan::where('id', $id)->update($validatedData);

        return redirect('/daftar-pesanan')->with('success', 'Barang Batal Dikirim!');
    }

    public function show($id)
    {
        $detail = PesananDetail::findorfail($id);

        // $detail = PesananDetail::where('kode', $details)->get();

        return view('pesanan.show   ', [
            "detail" => $detail
        ]);
    }
}
