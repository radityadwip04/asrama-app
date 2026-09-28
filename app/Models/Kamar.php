<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'asrama_id',
        'nomor_kamar',
        'lantai',
        'kapasitas',
        'status',
    ];

    /**
     * Kamar dimiliki oleh satu Asrama.
     */
    public function asrama()
    {
        return $this->belongsTo(Asrama::class);
    }

    /**
     * Satu Kamar memiliki banyak Santri.
     */
    public function santris()
    {
        return $this->hasMany(Santri::class);
    }
}
