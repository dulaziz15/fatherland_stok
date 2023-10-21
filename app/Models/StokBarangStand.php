<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarangStand extends Model
{
    use HasFactory;

    protected $fillable =['id_stand', 'id_barang', 'jumlah', 'note'];

    public function stand(){
        return $this->belongsTo(Stand::class, 'id_stand');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
