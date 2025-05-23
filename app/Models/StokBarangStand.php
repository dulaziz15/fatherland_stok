<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarangStand extends Model
{
    protected $table = 'stok_barang_stand';
    protected $primaryKey = 'id';
    use HasFactory;

    protected $fillable =['id_stand', 'id_barang', 'jumlah', 'note', 'sisa'];

    public function stand(){
        return $this->belongsTo(Stand::class, 'id_stand');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
