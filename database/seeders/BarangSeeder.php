<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'nama_barang' => "HP Andorid Apik",
            'kategori_id' => 1,
            'harga' => "100000",
            'stok' => "100",
            'status' => "0",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "TV Rusak 15 inch",
            'kategori_id' => 1,
            'harga' => "200000",
            'stok' => "200",
            'status' => "1",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "Sepatu jet",
            'kategori_id' => 2,
            'harga' => "10000",
            'stok' => "10",
            'status' => "0",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "Buku Apik Banget",
            'kategori_id' => 2,
            'harga' => "60000",
            'stok' => "120",
            'status' => "1",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "Roti Bosok",
            'kategori_id' => 2,
            'harga' => "60000",
            'stok' => "120",
            'status' => "0",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "Ciu Halal",
            'kategori_id' => 2,
            'harga' => "60000",
            'stok' => "120",
            'status' => "0",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "Xiaomi",
            'kategori_id' => 1,
            'harga' => "200000",
            'stok' => "200",
            'status' => "1",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "Oddo",
            'kategori_id' => 1,
            'harga' => "200000",
            'stok' => "200",
            'status' => "1",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "Vovo",
            'kategori_id' => 1,
            'harga' => "200000",
            'stok' => "200",
            'status' => "0",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);

        Barang::create([
            'nama_barang' => "Realme",
            'kategori_id' => 1,
            'harga' => "200000",
            'stok' => "200",
            'status' => "1",
            'keterangan' => "Lorem ipsum dolor amet"
        ]);
    }
}
