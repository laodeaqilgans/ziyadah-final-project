<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = 'santris';

    protected $guarded = []; // Mengizinkan semua kolom untuk diisi

    // Definisikan relasi dengan Ziyadah
    public function ziyadahs()
    {
        return $this->hasMany(Ziyadah::class);
    }
}