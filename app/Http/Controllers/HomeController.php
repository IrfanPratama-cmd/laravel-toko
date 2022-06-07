<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index()
    {
        // $barang = Barang::where('status', "1")->get();

        // dd($barang);

        return view('dashboard.index', [
            'barang' => Barang::where('status', "1")->get()
        ]);
    }

    public function barang()
    {
        // dd(request('search'));
        $title = '';
        if (request('kategori')) {
            $kategori = Kategori::firstwhere('kategori', request('kategori'));
            $title = 'di ' . $kategori->kategori;
        }

        return view('dashboard.barang', [
            "title" => "Semua barang " . $title,
            'barang' => Barang::latest()->filter(request(['search', 'kategori']))->paginate(8)
        ]);
    }

    // public function search()
    // {
    //     // dd(request('search'));


    //     $title = '';
    //     if (request('kategori')) {
    //         $kategori = Barang::firstwhere('kategori', request('kategori'));
    //         $title = 'di' . $kategori->kategori;
    //     }

    //     return view('dashboard.barang', [
    //         "title" => "Semua barang" . $title,
    //         'barang' => Barang::latest()->filter(request(['search', 'kategori']))->get()
    //     ]);
    // }

    public function categories()
    {
        return view('dashboard.categories', [
            'kategori' => Kategori::all()
        ]);
    }

    // public function kategori()
    // {
    //     // $id = Barang::where('kategori_id', $id);

    //     // $barang = Barang::findorfail($id);

    //     $title = '';
    //     if (request('kategori')) {
    //         $kategori = Kategori::firstwhere('kategori', request('kategori'));
    //         $title = 'di ' . $kategori->kategori;
    //     }

    //     $barang = Barang::latest()->filter(request(['kategori']))->get();
    //     // $barang = Barang::where('kategori_id', $kategori)->filter(request(['kategori']))->get();

    //     return view('dashboard.kategori', [
    //         "barang" => $barang,
    //         "title" => "Semua Barang " .  $title
    //     ]);
    // }

    public function kategori($id)
    {
        $id = Crypt::decrypt($id);

        $barang = Barang::where('kategori_id', $id)->get();
        $nama = Kategori::where('id', $id)->get()->toArray();
        $objectToArray = (array)$nama;
        $get1 = $objectToArray[0];
        $get2 = (array)$get1;
        $kategori = $get2['kategori'];

        $title = 'di ' . $kategori;

        return view('dashboard.kategori', [
            "barang" => $barang,
            "title" => "Semua Barang " . $title
        ]);
    }

    public function admin()
    {
        $barang = Barang::count();
        $kategori = Kategori::count();
        $pesanan = Pesanan::count();
        $user = User::count();

        return view('admin.index', compact('barang', 'kategori', 'user', 'pesanan'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $barang = Barang::findorfail($id);

        return view('dashboard.show', [
            "barang" => $barang
        ]);
    }
}
