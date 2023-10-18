<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Stand extends Model
{
    use HasFactory;
    protected $fillable = ['pegawai', 'alamat', 'no_telp', 'image', 'path_image', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class)->onDelete('cascade');
    }
}
