<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kariawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'gaji_per_hari'];
    protected $table = 'kariawans';
    
    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'guru_id');
    }
}
