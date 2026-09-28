<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asrama extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_asrama',
        'gedung',
        'alamat',
    ];

    /**
     * Satu Asrama memiliki banyak Kamar.
     */
    public function kamars()
    {
        return $this->hasMany(Kamar::class);
    }
}
