<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteKnowledge extends Model
{
    use HasFactory;

    protected $table = 'waste_knowledge';

    protected $fillable = [
        'jenis_sampah',
        'icon',
        'ciri_ciri',
        'pengelolaan',
        'deskripsi',
        'langkah_langkah',
        'kategori',
        'aktif'
    ];

    protected $casts = [
        'ciri_ciri' => 'array',
        'langkah_langkah' => 'array',
        'aktif' => 'boolean'
    ];

    // Scope untuk data aktif
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    // Scope berdasarkan kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }
}
