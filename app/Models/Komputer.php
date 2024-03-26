<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_komputer',
        'posisi',
        'status',
    ];
    /**
     * Get all of the Komputer for the Komputer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function LaporanKerusakan()
    {
        return $this->hasMany(LaporanKerusakan::class, 'id_komputer', 'id');
    }
}
