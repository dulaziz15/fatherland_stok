<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Stand extends Model
{
    protected $table = 'stand';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = ['pegawai', 'alamat', 'no_telp', 'image', 'path_image', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class)->onDelete('cascade');
    }

    public function penjualan()
    {
        return $this->hasMany(reportPenjualan::class);
    }

    public function StokBarang()
    {
        return $this->hasMany(StokBarangStand::class);
    }

    public function LogActivity() {
        return $this->hasMany(LogActivity::class);
    }
}
