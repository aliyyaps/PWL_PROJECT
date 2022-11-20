<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Inventaris;
class Label extends Model
{
    use HasFactory;
    protected $table = 'label';
    protected $primarykey = 'id';

    protected $fillable = [
        'nama_label',
    ];
    public function barang(){
        return $this->hasMany(Barang::Class);
    }
    public function inventaris(){
        return $this->hasMany(Inventaris::Class);
    }
}