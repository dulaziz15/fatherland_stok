<?php

namespace App\Http\Controllers;

use App\Services\BarangServices;
use App\Services\LogActivityServices;
use App\Services\StandServices;
use App\Services\StokBarangServices;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function __construct(
        private readonly StokBarangServices $stokBarangServices,
        private readonly BarangServices $barangServices,
        private readonly LogActivityServices $logActivityServices,
        private readonly StandServices $standServices
    ) {
    }

    public function index()
    {
        $log = $this->logActivityServices->getToday();
        $stok = $this->stokBarangServices->getAll();
        $barang = $this->barangServices->getAll();
        $result = [
            "log" => $log,
            "stok" => $stok,
            "barang" => $barang,
        ];
        return view('action.index', $result);
    }

    public function masuk(Request $request)
    {
        $barang = $this->stokBarangServices->getAll();
        if ($barang->isEmpty() == true) {
            $this->stokBarangServices->create($request);
        } else {
            $found = false;
            foreach ($barang as $item) {
                if ($item->id_barang == $request->barang) {
                    $this->stokBarangServices->updatePaket($request->barang, $request);
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $isUnique = true;
                foreach ($barang as $item) {
                    if ($item->id_barang == $request->barang) {
                        $isUnique = false;
                        break;
                    }
                }

                if ($isUnique) {
                    $this->stokBarangServices->create($request);
                } else {
                    // Handle the case when the ID is not unique
                }
            }
        }
        $action = 'masuk';
        $this->logActivityServices->create($action, $request, $request->barang);
        return redirect()->route('action')->with('success', 'Barang apply successfully');
    }

    public function keluar(Request $request)
    {
        $this->stokBarangServices->keluar($request->barang, $request);
        return redirect()->route('action');
    }

    public function log(){
        $log = $this->logActivityServices->getAll();
        $result = [
            "log" => $log
        ];
        return view('log.index', $result);
    }

    public function logAdmin(){
        $log = $this->logActivityServices->getLog();
        $stand = $this->standServices->getAll();
        $result = [
            "log" => $log,
            "stand" => $stand
        ];
        return view('log.admin', $result);
    }
}
