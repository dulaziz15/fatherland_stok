@extends('layouts.admin')
@section('card_judul', 'Edit User')
@section('content')
    <div class="card p-1">
        <div class="card-body">
            <div class="justify-content-end">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('user.index') }}" class="btn bg-gradient-dark mb-0"><i
                            class="fas fa-angle-double-left"></i>&nbsp;&nbsp;Back</a>
                </div>
            </div>
            <div class="card bg-gradient-light mt-4">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example3">Username</label>
                                    <input type="text" id="form8Example3" class="form-control" name="username" value="{{ $user->username }}"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example3">Password</label>
                                    <input type="password" name="password" class="form-control" name="password" id="inputPassword"
                                        placeholder="Password" value="{{ $user->password }}" required disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label">Role User</label>
                                <select class="form-select" id="single-select-field" name="role" data-placeholder="Choose one thing" required>
                                    <option value="{{ $user->role }}">{{ $user->role }}</option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example3">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="pegawai" value="{{ $user->stand->pegawai }}" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example3">Nomor Telepon</label>
                                    <input type="number" class="form-control" name="no_telp" value="{{ $user->stand->no_telp }}" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Lokasi Stand</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required>{{ $user->stand->alamat }}</textarea>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="formFile" class="form-label">Gambar (png/jpg)</label>
                                <input class="form-control" type="file" id="formFile" name="image" onchange="preview()" value="{{ $user->stand->image }}">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <img id="frame" src="{{ asset($user->stand->path_image . '/' . $user->stand->image) }}" class="img-fluid my-3" width="530px" alt="Preview gambar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end align-items-center mt-3">
                                <button class="btn bg-gradient-dark mx-2" type="button" onclick="clearImage()">Clear Image</button>
                                <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
                                <button class="btn bg-gradient-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
