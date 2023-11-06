<?php

namespace App\Services;

use App\Contracts\Interfaces\StokBarangServicesInterface;
use App\Models\Barang;
use App\Models\StokBarangStand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokBarangServices implements StokBarangServicesInterface
{
    public function __construct(
        private readonly StokBarangStand $stokBarangStand,
        private readonly BarangServices $barangServices,
        private readonly LogActivityServices $logActivityServices
    ) {
    }

    public function create(Request $request)
    {
        StokBarangStand::create([
            'id_stand' => Auth::user()->stand->id,
            'id_barang' => $request->barang,
            'jumlah' => $request->jumlah,
            'note' => $request->note
        ]);
    }

    public function getStok()
    {
        $stok = StokBarangStand::with('barang', 'stand')->where('id_stand', Auth::user()->stand->id)->paginate(5);
        return $stok;
    }

    public function getAll()
    {
        $stok = StokBarangStand::with('barang', 'stand')->where('id_stand', Auth::user()->stand->id)->get();
        return $stok;
    }

    public function get()
    {
        $stok = StokBarangStand::with('barang', 'stand')->where(function ($query) {
            $query->where('jumlah', '<=', 3)
                ->orWhere('sisa', \App\enums\enumsSisa::sedikit);
        })->get()->groupBy('id_stand');
        return $stok;
    }

    public function getById($id)
    {
        $stok = StokBarangStand::where('id', $id)->with('barang', 'stand')->first();
        return $stok;
    }

    public function update($id, Request $request)
    {
        $stok = StokBarangStand::where('id_barang', $id)->where('id_stand', Auth::user()->stand->id)->first();
        $stok->update([
            'id_stand' => Auth::user()->stand->id,
            'id_barang' => $request->barang,
            'jumlah' => ($stok->jumlah + $request->jumlah),
            'note' => $request->note
        ]);
    }

    public function delete($id)
    {
        $stok = $this->getById($id);
        $stok->delete();
    }

    public function keluar($id, $request)
    {
        $stok = $this->getById($id);
        $action = 'keluar';
        if (($stok->jumlah - $request->jumlah) < 0) {
            return redirect()->route('action')->with('error', 'Barang tidak cukup');
        } else {
            $stok->update([
                'jumlah' => ($stok->jumlah - $request->jumlah),
            ]);
            $this->logActivityServices->create($action, $request, $stok->id_barang);
            return redirect()->route('action')->with('success', 'Barang berhasil keluar');
        }
    }

    public function stokAvaliable($id)
    {
        $stok = StokBarangStand::where('id_barang', $id)->with('barang', 'stand')->first();
        return $stok;
    }
}
