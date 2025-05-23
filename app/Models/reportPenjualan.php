<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportPenjualan extends Model
{
    use HasFactory;
    protected $table = 'report_penjualan';
    protected $primaryKey = 'id';
    protected $fillable = ['id_stand', 'barang', 'jumlah'];

    public function stand(){
        return $this->belongsTo(Stand::class, 'id_stand');
    }
}
