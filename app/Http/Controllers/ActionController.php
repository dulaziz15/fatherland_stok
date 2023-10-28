<?php

namespace App\Http\Controllers;

use App\Services\BarangServices;
use App\Services\LogActivityServices;
use App\Services\StokBarangServices;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function __construct(
        private readonly StokBarangServices $stokBarangServices,
        private readonly BarangServices $barangServices,
        private readonly LogActivityServices $logActivityServices
    ) {
    }

    public function index()
    {
        $barang = $this->barangServices->getAll();
        $log = $this->logActivityServices->getAll();
        $result = [
            "barang" => $barang,
            "log" => $log
        ];
        return view('action.index', $result);
    }

    public function masuk(Request $request)
    {
        $barang = $this->stokBarangServices->getAll();
        if($barang->isEmpty() == true){
            $this->stokBarangServices->create($request);
        }else{
            $found = false;
            foreach ($barang as $item) {
                if ($item->id_barang == $request->barang) {
                    $this->stokBarangServices->update($request->barang, $request);
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                // Logic to check for uniqueness before creating a new entry
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
        $this->logActivityServices->create($request);
        return redirect()->route('action')->with('success', 'Barang apply successfully');
    }

    public function keluar()
    {
    }
}
