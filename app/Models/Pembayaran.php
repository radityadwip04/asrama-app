<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'tanggal_pembayaran',
        'jenis_pembayaran',
        'jumlah',
        'status',
        'keterangan',
    ];

    /**
     * Pembayaran dimiliki oleh satu Santri.
     */
    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
