<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Services\CategoryServices;
use App\Services\BarangServices;

class BarangController extends Controller
{
    public function __construct(
        private readonly CategoryServices $categoryService,
        private readonly BarangServices $barangService,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = $this->barangService->getBarang();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->categoryService->findAll();
        return view('barang.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('gambar');
        $name_image = $file->getClientOriginalName();
        $tujuan_upload = 'images/barang';
        $file->move($tujuan_upload, $file->getClientOriginalName());
        $barang = new Barang([
            'id_category' => $request->id_category,
            'name' => $request->barang,
            'jumlah' => $request->jumlah,
            'image' => $name_image,
            'type' => $request->type,
            'path_image' => $tujuan_upload,
        ]);
        $this->barangService->create($barang);
        return redirect()->route('barang.index')->with('success', 'Barang created successfully');
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
        $barang = $this->barangService->getById($id);
        $category = $this->categoryService->findAll();
        $return = [
            'category' => $category,
            'barang' => $barang
        ];
        return view('barang.edit', $return);
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
        $this->barangService->update($request, $id);
        return redirect()->route('barang.index')->with('success', 'Barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->barangService->delete($id);
        return redirect()->route('barang.index')->with('success', 'Barang deleted successfully');
    }

    public function filter($type){
        $barang = $this->barangService->filter($type);
        return $barang;
    }
}
