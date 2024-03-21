<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKerusakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_komputer',
        'tanggal',
        'deskripsi',
    ];
    /**
     * Get the User that owns the LaporanKerusakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    /**
     * Get the Komputer that owns the LaporanKerusakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Komputer()
    {
        return $this->belongsTo(Komputer::class, 'id_komputer', 'id');
    }
    protected static function boot()
    {
        parent::boot();
    
        // Event listener untuk menangani perubahan status komputer saat laporan kerusakan disimpan
        static::saved(function ($laporanKerusakan) {
            // Dapatkan komputer terkait dengan laporan kerusakan yang baru disimpan
            $komputer = $laporanKerusakan->komputer;
    
            // Periksa apakah komputer ditemukan dan memiliki status 'success'
            if ($komputer && $komputer->status === 'success') {
                // Ubah status komputer menjadi 'pending'
                $komputer->update(['status' => 'pending']);
            }
        });
    }
}
