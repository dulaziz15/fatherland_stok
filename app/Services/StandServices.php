<?php

namespace App\Services;

use App\Contracts\Interfaces\StandServicesInterface;
use App\Models\Stand;
use Illuminate\Http\Request;
use Mockery\Undefined;

class StandServices implements StandServicesInterface {
    public function __construct(private readonly Stand $stand)
    {
    }

    public function store($stand) {
        Stand::create([
            'pegawai' => $stand->pegawai,
            'alamat' => $stand->alamat,
            'no_telp' => $stand->no_telp,
            'image' => $stand->image,
            'path_image' => $stand->path_image,
            'id_user' => $stand->id_user,
        ]);
    }

    public function getById($id){
        $stand = Stand::where('id', $id)->first();
        return $stand;
    }

    public function update($id, $request){
        $stand = $this->getById($id);
        if($request->image == null){
            $stand->update([
                'pegawai' => $request->pegawai,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]);
        }else{
            $file = $request->file('image');
           $name_image = $file->getClientOriginalName();
           $tujuan_upload = 'images/stand';
           $file->move($tujuan_upload,$file->getClientOriginalName());
            $stand->update([
                'pegawai' => $request->pegawai,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'image' => $name_image,
                'path_image' => $tujuan_upload,
            ]);
        }
    }

    public function delete($id){
        $stand = $this->getById($id);
        $stand->delete();
    }
}
