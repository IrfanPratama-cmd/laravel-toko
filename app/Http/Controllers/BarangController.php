<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang.index', [
            'barang' => Barang::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create', [
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'kategori_id' => 'required',
            'harga' => 'required|max:255',
            'stok' => 'required|max:255',
            'gambar_barang' => 'required|file|max:8192',
            'keterangan' => 'required'
        ]);

        if ($request->file('gambar_barang')) {
            $validatedData['gambar_barang'] = $request->file('gambar_barang')->store('gambar-barang');
        }

        $validatedData['status'] = "0";

        Barang::create($validatedData);

        return redirect('barang')->with('success', 'Tambah Barang Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        // dd($barang);
        return view('barang.edit', [
            'barang' => $barang,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'nama_barang' => 'required|max:255',
            'kategori_id' => 'required',
            'harga' => 'required|max:255',
            'stok' => 'required|max:255',
            'keterangan' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar_barang')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar_barang'] = $request->file('gambar_barang')->store('gambar-barang');
        }

        // $validatedData['keterangan'] = strip_tags($request->keterangan);

        $validatedData['status'] = $request->status;

        Barang::where('id', $barang->id)
            ->update($validatedData);

        return redirect('barang')->with('success', 'Barang Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        if ($barang->image) {
            Storage::delete($barang->gambar_barang);
        }
        Barang::destroy($barang->id);

        return redirect('barang')->with('success', 'Barang Berhasil di Hapus');
    }
}
