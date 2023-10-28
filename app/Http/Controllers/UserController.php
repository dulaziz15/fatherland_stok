<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Models\User;
use App\Services\StandServices;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private readonly UserServices $userServices,
        private readonly StandServices $standServices,
    ) {}
    /**@for (condition)
     *

    @endfor
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->userServices->getAll();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User([
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        $data_user = $this->userServices->store($user);
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);

           $file = $request->file('image');
           $name_image = $file->getClientOriginalName();
           $tujuan_upload = 'images/stand';
           $file->move($tujuan_upload,$file->getClientOriginalName());
        $stand = new Stand([
            'pegawai' => $request->pegawai,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'image' => $name_image,
            'path_image' => $tujuan_upload,
            'id_user' => $data_user->id,
        ]);

        $this->standServices->store($stand);

        return redirect()->route('user.index')->with('success', 'User and Stand created successfully');
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
        $user = $this->userServices->getById($id);
        return view('user.edit', compact('user'));
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
        $this->userServices->update($id, $request);
        $data_user_stand = $this->userServices->getById($id);
        $data_stand = $this->standServices->getById($data_user_stand->stand->id);
        $this->standServices->update($data_stand->id, $request);
        return redirect()->route('user.index')->with('success', 'User and Stand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_user_stand = $this->userServices->getById($id);
        $this->userServices->delete($id);
        return redirect()->route('user.index')->with('success', 'User and Stand deleted successfully');
    }
}
