<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryPeriod extends Model
{
    use HasFactory;

    protected $fillable = ['bulan', 'tahun'];

    // public function entries()
    // {
    //     return $this->hasMany(Entry::class);
    // }

    /**
     * Accessor untuk menampilkan periode lengkap (contoh: "November 2025")
     */
    public function getPeriodeAttribute()
    {
        return "{$this->bulan} {$this->tahun}";
    }

    public function entries()
    {
        return $this->hasMany(EntryMain::class);
    }
}
