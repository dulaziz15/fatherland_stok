<?php

namespace App\Services;

use App\Contracts\Interfaces\StokBarangServicesInterface;
use App\Models\Barang;
use App\Models\StokBarangStand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokBarangServices implements StokBarangServicesInterface {
    public function __construct(
        private readonly StokBarangStand $stokBarangStand,
        private readonly BarangServices $barangServices
    ) {}

    public function create(Request $request){
        StokBarangStand::create([
            'id_stand' => Auth::user()->stand->id,
            'id_barang' => $request->barang,
            'jumlah' => $request->jumlah,
            'type' => $request->type,
            'sisa' => $request->sisa,
            'note' => $request->note
        ]);
    }

    public function getStok(){
        $stok = StokBarangStand::with('barang', 'stand')->where('id_stand', Auth::user()->stand->id)->paginate(5);
        return $stok;
    }

    public function getAll(){
        $stok = StokBarangStand::with('barang', 'stand')->where('id_stand', Auth::user()->stand->id)->get();
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
            'id_stand' => Auth::user()->stand->id,
            'id_barang' => $request->barang,
            'jumlah' => ($stok->jumlah + $request->jumlah),
            'type' => $request->type,
            'sisa' => $request->sisa,
            'note' => $request->note
        ]);
    }

    public function delete($id)
    {
        $stok = $this->getById($id);
        $stok->delete();
    }

    public function stokAvaliable($id)
    {
        $stok = StokBarangStand::where('id_barang', $id)->with('barang', 'stand')->first();
        return $stok;
    }
}
