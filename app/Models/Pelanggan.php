<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan
    protected $table = 'tb_pelanggan';

    // Menentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'pel_id_gol',
        'pel_id_user',
        'pel_no',
        'pel_nama',
        'pel_alamat',
        'pel_hp',
        'pel_ktp',
        'pel_seri',
        'pel_meteran',
        'pel_aktif'
    ];

    // Definisikan relasi ke tabel tb_golongan
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'pel_id_gol', 'gol_id');
    }

    // Definisikan relasi ke tabel tb_users
    public function user()
    {
        return $this->belongsTo(Users::class, 'pel_id_user', 'user_id');
    }
}
