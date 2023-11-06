<?php

namespace App\Services;

use App\Contracts\Interfaces\BarangServicesInterface;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangServices implements BarangServicesInterface {
    public function __construct(private readonly Barang $barang)
    {
    }

    public function getBarang(){
        $barang = Barang::with('category')->paginate(5);
        return $barang;
    }

    public function getById($id){
        $barang = Barang::where('id', $id)->first();
        return $barang;
    }

    public function getAll(){
        $barang = Barang::with('category')->get();
        return $barang;
    }

    public function filter($type){
        $barang = Barang::with('category')->where('type', $type)->get();
        return $barang;
    }


    public function create($barang) {
        Barang::create([
            'id_category' => $barang->id_category,
            'name' => $barang->name,
            'image' => $barang->image,
            'type' => $barang->type,
            'path_image' => $barang->path_image
        ]);
    }

    public function updateBarang($id, $jumlahBarang)
    {
        $barang = Barang::where('id', $id)->first();
        $barang->update([
            'jumlah' => $jumlahBarang,
        ]);
    }

    public function delete($id)
    {
        $barang = $this->getById($id);
        $barang->delete();
    }

    public function update(Request $request, $id) {
        $barang = $this->getById($id);
        if($request->gambar == null) {
            $barang->update([
                'name' => $request->name,
                'id_category' => $request->id_category,
                'type' => $request->type,
            ]);
        }else{
            $file = $request->file('gambar');
           $name_image = $file->getClientOriginalName();
           $tujuan_upload = 'images/barang';
           $file->move($tujuan_upload,$file->getClientOriginalName());
            $barang->update([
                'name' => $request->name,
                'id_category' => $request->id_category,
                'path_image' => $tujuan_upload,
                'image' => $name_image,
                'type' => $request->type,
            ]);
        }
    }
}
