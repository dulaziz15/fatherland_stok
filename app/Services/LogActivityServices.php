<?php

namespace App\Services;

use App\Contracts\Interfaces\LogActivityServicesInterface;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogActivityServices implements LogActivityServicesInterface {
    public function create(Request $request)
    {
        LogActivity::create([
            'id_stand' => Auth::user()->stand->id,
            'id_barang' => $request->barang,
            'action' => 'masuk',
            'jumlah' => $request->jumlah,
            'note' => $request->note,
        ]);
    }

    public function getAll() {
        $log = LogActivity::with('barang', 'stand')
                ->where('id_stand', Auth::user()->stand->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        return $log;
    }
}
