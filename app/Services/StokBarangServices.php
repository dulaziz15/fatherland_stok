<?php

namespace App\Services;

use App\Contracts\Interfaces\StokBarangServicesInterface;
use App\Models\StokBarangStand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokBarangServices implements StokBarangServicesInterface {
    public function __construct(
        private readonly StokBarangStand $stokBarangStand
    ) {}

    public function create(Request $request){
        StokBarangStand::create([
            'id_stand' => Auth::user()->stand->id,
            'id_barang' => $request->barang,
            'jumlah' => $request->jumlah,
            'note' => $request->note
        ]);
    }

    public function getStok(){
        $stok = StokBarangStand::with('barang', 'stand')->paginate(5);
        return $stok;
    }

    public function getById($id)
    {
        $stok = StokBarangStand::where('id', $id)->with('barang', 'stand')->first();
        return $stok;
    }

    public function update($id, Request $request)
    {
        $stok = $this->getById($id);
        $stok->update([
            'id_barang' => $request->barang,
            'jumlah' => $request->jumlah,
            'note' => $request->note
        ]);
    }
}
