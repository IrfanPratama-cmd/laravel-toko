<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pesanan_detail()
    {
        return $this->hasMany(PesananDetail::class, 'barang_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $searh) {
            return $query->where('nama_barang', 'like', '%' . $searh . '%');
        });

        // $query->when($filters['kategori'] ?? false, function ($query, $searh) {
        //     return $query->where('kategori', 'like', '%' . $searh . '%');
        // });
    }
}
