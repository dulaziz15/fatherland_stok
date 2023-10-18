<?php

namespace App\Services;

use App\Contracts\Interfaces\UserServicesInterface;
use App\Models\User;
use App\enums\enumsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserServices implements UserServicesInterface {

    public function __construct(private readonly User $user)
    {
    }

    public function store($user) {
        $data = User::create([
            'username' => $user->username,
            'password' => Hash::make($user->password),
            'role' => $user->role,
        ]);
        return $data;
    }

    public function getAll(){
        $user = User::with('stand')->where('role', enumsUser::user)->get();
        return $user;
    }

    public function getById($id)
    {
        $user = User::with('stand')->where('id', $id)->first();
        return $user;
    }

    public function update($id, $request) {
        $user = $this->getById($id);
        $user->update([
            'username' => $request->username,
            'role' => $request->role
        ]);
        return $user;
    }

    public function delete($id){
        $user = $this->getById($id);
        $user->delete();
    }
}
