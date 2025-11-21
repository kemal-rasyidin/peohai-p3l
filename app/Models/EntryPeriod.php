<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryPeriod extends Model
{
    use HasFactory;

    protected $fillable = ['bulan', 'tahun'];

    // public function getNamaBulanAttribute()
    // {
    //     $bulanList = [
    //         1 => 'Januari',
    //         2 => 'Februari',
    //         3 => 'Maret',
    //         4 => 'April',
    //         5 => 'Mei',
    //         6 => 'Juni',
    //         7 => 'Juli',
    //         8 => 'Agustus',
    //         9 => 'September',
    //         10 => 'Oktober',
    //         11 => 'November',
    //         12 => 'Desember'
    //     ];

    //     return $bulanList[$this->bulan] ?? '-';
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
