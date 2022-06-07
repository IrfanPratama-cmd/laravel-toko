<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['kategori', 'gambar_kategori'];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['kategori'] ?? false, function ($query, $searh) {
            return $query->where('kategori', 'like', '%' . $searh . '%')
                ->orWhere('id', 'like', '%' . $searh . '%');
        });
    }
}
