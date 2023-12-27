<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuInduk extends Model
{
    use HasFactory;
    protected $table = 'tb_buku_induk';
    protected $fillable = [
        'no_register',
        'nama',
        'tempat_ttl',
        'tanggal_lahir',
        'kelamin',
        'kabupaten',
        'kecamatan',
        'desa',
        'domisili',
        'aktif_organisasi',
        'nbm',
        'pekerjaan',
        'pendidikan',
        'no_hp',
        'status',
        'status_sosial',
        'ktp',
        'referal',
        'tps',
    ];

    public function scopeSearch( $query, $value)
    {
        $query->where('no_register','LIKE', "%{$value}%")
        ->orWhere('nama','LIKE', "%{$value}%")
        ->orWhere('tempat_ttl','LIKE', "%{$value}%")
        ->orWhere('tanggal_lahir','LIKE', "%{$value}%")
        ->orWhere('kelamin','LIKE', "%{$value}%")
        ->orWhere('kabupaten','LIKE', "%{$value}%")
        ->orWhere('kecamatan','LIKE', "%{$value}%")
        ->orWhere('desa','LIKE', "%{$value}%")
        ->orWhere('domisili','LIKE', "%{$value}%")
        ->orWhere('aktif_organisasi','LIKE', "%{$value}%")
        ->orWhere('nbm','LIKE', "%{$value}%")
        ->orWhere('pekerjaan','LIKE', "%{$value}%")
        ->orWhere('pendidikan','LIKE', "%{$value}%")
        ->orWhere('no_hp','LIKE', "%{$value}%")
        ->orWhere('status','LIKE', "%{$value}%")
        ->orWhere('status_sosial','LIKE', "%{$value}%")
        ->orWhere('ktp','LIKE', "%{$value}%");
    }
}
