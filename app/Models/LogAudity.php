<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Label;
use App\Models\Barang;
use App\Models\User;
class LogAudity extends Model
{
    use HasFactory;
    protected $table = 'logaudity';
    protected $primarykey = 'id';
    public function label(){
        return $this->belongsTo(Label::class);
    }
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}