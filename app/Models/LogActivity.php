<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;
    protected $table = 'log_activity';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_stand', 'id_barang', 'action', 'jumlah', 'tujuan', 'note'
    ];

    public function stand(){
        return $this->belongsTo(Stand::class, 'id_stand');
    }

    public function barang() {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
