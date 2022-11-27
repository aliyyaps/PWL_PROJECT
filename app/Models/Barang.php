<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Label;
class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primarykey = 'id';

    protected $fillable = [
        'nama_barang',
        'label_id',
    ];
    public function label(){
        return $this->belongsTo(Label::class);
    }
    public function inventaris(){
        return $this->hasMany(Inventaris::Class);
    }
    public function logaudity(){
        return $this->hasMany(Inventaris::Class);
    }
    public function transaksi(){
        return $this->hasMany(Inventaris::Class);
    }
}