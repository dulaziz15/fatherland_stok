<?php

namespace App\Http\Controllers;

use App\Services\BarangServices;
use App\Services\PenjualanServices;
use App\Services\StandServices;
use App\Services\StokBarangServices;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private readonly StokBarangServices $stokBarangServices,
        private readonly BarangServices $barangServices,
        private readonly StandServices $standServices,
        private readonly PenjualanServices $penjualanServices,
    )
    {

    }

    public function index(){
        $stand = $this->standServices->getAll();
        $barang = $this->barangServices->getAll();
        $stokBarang = $this->stokBarangServices->get();
        $piscok = $this->penjualanServices->getPiscok();
        $brownis = $this->penjualanServices->getBrownis();
        $jumlahPiscok = $this->penjualanServices->jumlahPiscok();
        $jumlahBrownis = $this->penjualanServices->jumlahBrownis();
        $result = [
            "jumlahStand" => $stand->count(),
            "jumlahBarang" => $barang->count(),
            "stand" => $stand,
            "stokBarang" => $stokBarang,
            "piscok" => $piscok,
            "brownis" => $brownis,
            "jumlahBrownis" => $jumlahBrownis,
            "jumlahPiscok" => $jumlahPiscok,
        ];
        return view('pages.dashboard', $result);
    }
}
