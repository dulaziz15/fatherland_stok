<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = ['id_category', 'name', 'type', 'image', 'path_image'];

    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function stokBarang() {
        return $this->hasMany(StokBarangStand::class);
    }

    public function LogActivity() {
        return $this->hasMany(LogActivity::class);
    }
}
