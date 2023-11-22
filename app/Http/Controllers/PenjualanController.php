<?php

namespace App\Http\Controllers;

use App\Services\PenjualanServices;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function __construct(
        private readonly PenjualanServices $penjualanServices,
    )
    {}
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
        $this->penjualanServices->store($request);
        return redirect()->route('penjualan.index')->with('success', 'Report Pernjualan created successfully');
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
        $this->penjualanServices->delete($id);
        return redirect()->route('penjualan.index');
    }

    public function admin()
    {
        $penjualan = $this->penjualanServices->getReport();
        return view('penjualan.admin', compact('penjualan'));
    }
}
