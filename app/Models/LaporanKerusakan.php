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
}
