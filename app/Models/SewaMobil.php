<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaMobil extends Model
{
    use HasFactory;
    protected $table = 'sewa_mobil';
    protected $primarykey = 'id';

    protected $fillable = [
        'alamat',
        'tanggal_sewa',
        'tanggal_kembali',
        'tarif',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
