<?php

namespace App\Http\Controllers;

use App\Services\BarangServices;
use App\Services\StokBarangServices;
use Illuminate\Http\Request;

class StokStandController extends Controller
{
    public function __construct(
        private readonly StokBarangServices $stokBarangService,
        private readonly BarangServices $barangServices,
    )
    {}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = $this->barangServices->getAll();
        $stok = $this->stokBarangService->getStok();
        $result = [
            'barang' => $barang,
            'stok' => $stok,
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
        $this->stokBarangService->create($request);
        return redirect()->route('stok.index')->with('success', 'Stok Barang created successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
