<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ziyadah extends Model
{
    use HasFactory;

    protected $table = 'ziyadah';

    protected $fillable = [
        'santri_id', 'juz', 'surat', 'ayat', 'catatan', 'tanggal_ziyadah',
    ];

    // Definisikan relasi dengan Santri
    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}