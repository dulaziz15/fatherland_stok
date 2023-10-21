<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['id_category', 'name', 'jumlah', 'image', 'path_image'];

    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function stokBarang() {
        return $this->hasMany(StokBarangStand::class);
    }
}
