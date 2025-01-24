<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = ['kariawan_id', 'tanggal_kehadiran'];

    public function kariawan()
    {
        return $this->belongsTo(Kariawan::class);
    }
}
