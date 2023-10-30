<?php

namespace App\Services;

use App\Contracts\Interfaces\PenjualanServicesInterface;
use App\Models\reportPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanServices implements PenjualanServicesInterface
{
    public function __construct(reportPenjualan $reportPenjualan)
    {
    }

    public function store(Request $request)
    {
        ReportPenjualan::create([
            'id_stand' => Auth::user()->stand->id,
            'barang' => $request->barang,
            'jumlah' => $request->jumlah,
        ]);
    }

    public function getAll()
    {
        $penjualan = reportPenjualan::with('stand')
            ->where('id_stand', Auth::user()->stand->id)
            ->paginate(5);
        return $penjualan;
    }

    public function getById($id)
    {
        $penjualan = reportPenjualan::where('id', $id)->first();
        return $penjualan;
    }

    public function delete($id) {
        $penjualan = $this->getById($id);
        $penjualan->delete();
    }
}
