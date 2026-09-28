<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'kamar_id',
        'nis',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'status',
    ];

    /**
     * Santri dimiliki oleh satu Kamar.
     */
    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    /**
     * Satu Santri memiliki banyak Pembayaran.
     */
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    /**
     * Satu Santri memiliki banyak Absensi.
     */
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
