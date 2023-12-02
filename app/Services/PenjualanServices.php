<?php

namespace App\Services;

use App\Contracts\Interfaces\PenjualanServicesInterface;
use App\Models\reportPenjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanServices implements PenjualanServicesInterface
{
    protected $reportPenjualan;
    protected $currentMonth;
    protected $endOfMonth;

    public function __construct(reportPenjualan $reportPenjualan, $currentMonth = null, $endOfMonth = null)
    {
        $this->reportPenjualan = $reportPenjualan;
        $this->currentMonth = $currentMonth ?? Carbon::now()->startOfMonth();
        $this->endOfMonth = $endOfMonth ?? Carbon::now()->endOfMonth();
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
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return $penjualan;
    }

    public function getReport()
    {
        $penjualan = reportPenjualan::with('stand')
            ->orderBy('created_at', 'desc')
            ->get();

        return $penjualan;
    }

    public function getIncome()
    {
        $penjualan = reportPenjualan::with('stand')
            ->orderBy('created_at', 'desc')
            ->get();
        $income = 0;
        foreach($penjualan as $barang){
            $income += ($barang->jumlah * 2500);
        }
        return $income;
    }

    public function getAllReport()
    {
        $penjualan = reportPenjualan::with('stand')
            ->orderBy('created_at', 'desc')
            ->get();
        return $penjualan;
    }

    public function getPiscok()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $piscok = reportPenjualan::with('stand')
            ->where('barang', \App\Enums\enumsProduk::piscok)
            ->whereDate('created_at', '>=', $startOfMonth)
            ->whereDate('created_at', '<=', $endOfMonth)
            ->get()
            ->groupBy('id_stand');
        return $piscok;
    }

    public function getBrownis()
    {
        $brownis = reportPenjualan::with('stand')
            ->where('barang',  \App\Enums\enumsProduk::brownis)
            ->get()
            ->groupBy('id_stand');
        return $brownis;
    }

    public function jumlahPiscok()
    {
        $piscok = reportPenjualan::with('stand')
            ->where('barang', \App\Enums\enumsProduk::piscok)
            ->get();

        $jumlah = 0;

        foreach ($piscok as $semuaPiscok) {
            $jumlah += $semuaPiscok->jumlah;
        }

        return $jumlah;
    }

    public function jumlahBrownis()
    {
        $brownis = reportPenjualan::with('stand')
            ->where('barang', \App\Enums\enumsProduk::brownis)
            ->get();

        $jumlah = 0;

        foreach ($brownis as $semuaBrownis) {
            $jumlah += $semuaBrownis->jumlah;
        }

        return $jumlah;
    }

    public function getById($id)
    {
        $penjualan = reportPenjualan::where('id', $id)->first();
        return $penjualan;
    }

    public function update($request, $id)
    {
        $penjualan = reportPenjualan::where('id', $id)->first();
        $penjualan->update([
            'jumlah' => $request->jumlah,
        ]);
    }

    public function delete($id)
    {
        $penjualan = $this->getById($id);
        $penjualan->delete();
    }
}
