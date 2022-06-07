<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
    }

    public function pesan($id)
    {
        $id = Crypt::decrypt($id);

        $barang = Barang::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $barang->id,
                "nama_barang" => $barang->nama_barang,
                "quantity" => 1,
                "stok" => $barang->stok,
                "harga" => $barang->harga,
                "gambar_barang" => $barang->gambar_barang
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Barang berhasil diupdate!');
        }
    }

    public function delete(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Barang berhasil dihapus!');
        }
    }
}
