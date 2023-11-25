<?php

namespace App\Http\Controllers;

use App\Services\PenjualanServices;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function __construct(
        private readonly PenjualanServices $penjualanServices,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = $this->penjualanServices->getAll();
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reportPenjualan = $this->penjualanServices->getAllReport();

        if ($reportPenjualan->isEmpty()) {
            $this->penjualanServices->store($request);
            return redirect()->route('penjualan.index')->with('success', 'Report Penjualan created successfully');
        }

        $todayReports = $reportPenjualan->filter(function ($item) use ($request) {
            return $item->created_at->toDateString() === now()->toDateString() && $item->barang == $request->barang;
        });

        if ($todayReports->isNotEmpty()) {
            return redirect()->route('penjualan.index')->with('error', 'Report Penjualan already exists for today please edit your report today');
        }

        $this->penjualanServices->store($request);
        return redirect()->route('penjualan.index')->with('success', 'Report Penjualan created successfully');
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
        $penjualan = $this->penjualanServices->getById($id);
        return $penjualan;
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
        $this->penjualanServices->update($request, $id);
        return redirect()->route('penjualan.index')->with('success', 'Report Pernjualan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->penjualanServices->delete($id);
        return redirect()->route('penjualan.index');
    }

    public function admin()
    {
        $penjualan = $this->penjualanServices->getReport();
        return view('penjualan.admin', compact('penjualan'));
    }
}
