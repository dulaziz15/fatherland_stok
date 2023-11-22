<?php

namespace App\Http\Controllers;

use App\Services\BarangServices;
use App\Services\LogActivityServices;
use App\Services\StokBarangServices;
use Illuminate\Http\Request;

class StokStandController extends Controller
{
    public function __construct(
        private readonly StokBarangServices $stokBarangService,
        private readonly BarangServices $barangServices,
        private readonly LogActivityServices $logActivityServices,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = $this->stokBarangService->getAll();
        $satuan = $this->barangServices->getSatuan();
        $stok = $this->stokBarangService->getStok();
        $result = [
            'barang' => $barang,
            'stok' => $stok,
            'satuan' => $satuan,
        ];
        return view('stok.index', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = 'masuk';
        $stok = $this->stokBarangService->getAll();
        $allready = false;
        foreach($stok as $stokBarang){
            if($stokBarang->id_barang == $request->barang){
                return redirect()->route('stok.index')->with('error', 'Barang all ready exist');
                $allready = true;
                break;
            }
        }
        if(!$allready){
            $this->stokBarangService->createSatuan($request);
            $this->logActivityServices->create($action, $request, $request->barang);
        }
        return redirect()->route('stok.index')->with('success', 'Barang successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok = $this->stokBarangService->getById($id);
        return json_decode($stok);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $action = 'update';
        $this->stokBarangService->update($id, $request);
        $this->logActivityServices->create($action, $request, $request->id_barang);
        return redirect()->route('stok.index')->with('success', 'Stok updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->stokBarangService->delete($id);
        return redirect()->route('stok.index')->with('success', 'Stok deleted successfully');
    }

    public function stok()
    {
        $satuan = $this->stokBarangService->getSatuan();
        $paket = $this->stokBarangService->getPaket();
        $result = [
            'satuan' => $satuan,
            'paket' => $paket
        ];
        return view('stok.admin', $result);
    }
}
