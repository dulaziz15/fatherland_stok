@extends('layouts.admin')
@section('card_judul', 'User')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('user.create') }}" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"
                        aria-hidden="true"></i>&nbsp;&nbsp;Add User</a>
            </div>
            @include('user.editPassword')
        </div>
        <div class="table-responsive">
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pegawai
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Telp
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Create
                                At</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>
                                    <div class="d-flex py-1">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->username }}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->role }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->stand->pegawai }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->stand->no_telp }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at->format('d F, Y') }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-2">
                                            <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn bg-gradient-danger d-none d-md-block"
                                                    onclick="return confirm()" data-bs-toggle="tooltip" title="Delete"
                                                    type="submit"><span class="btn-inner--icon text-white"><i
                                                            class="fas fa-trash"></i></span></button>
                                            </form>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{ route('user.edit', $item->id) }}">
                                                <button class="btn bg-gradient-warning d-none d-md-block" data-bs-toggle="tooltip" title="Edit"
                                                    title="Edit"><span class="btn-inner--icon text-white"><i
                                                            class="fa fa-pencil"></i></span></button></a>
                                        </div>
                                        <div class="col-lg-2">
                                                <button class="btn bg-gradient-info d-none d-md-block" onclick="formForgotPassword({{ $item->id }})" data-bs-toggle="tooltip" title="Ubah Password"
                                                    title="Edit"><span class="btn-inner--icon text-white" ><i
                                                            class="fa fa-key"></i></span></button>
                                        </div>
                                    </div>
                                    {{-- mobile --}}
                                    <div class="btn-group dropleft mt-3 d-md-none">
                                        <button type="button" class="btn bg-gradient-dark dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">

                                        </button>
                                        <ul class="dropdown-menu px-2 py-3 bg-body border"
                                            aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="{{ route('user.edit', $item->id) }}"><button title="Edit"
                                                        class="dropdown-item border-radius-md">Edit</button></a>
                                            </li>
                                            <li>
                                                <button title="Edit"
                                                        class="dropdown-item border-radius-md" onclick="formForgotPassword({{ $item->id }})">Ubah Password</button>
                                            </li>
                                            <li>
                                                <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm()"
                                                        class="dropdown-item border-radius-md"
                                                        type="submit">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function formForgotPassword(id){
            const form = $('#formForgotPassword');
            if (form.is(':visible')) {
                form.fadeOut();
            } else {
                form.fadeIn();
            }
            $.ajax({
                url: '{{ route('forgotPassword.edit',' + id +  ') }}',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#pegawaiForgotPassword').val(response.username);
                    console.log(response);
                    // $('#barang').append('<option value="' + response.barang.id + '">' + response.barang.name +
                    //     '</option>');
                    // $('#note').val(response.note);
                    // $('#updateStok').attr('onclick', 'formUpdate(' + response.id + ')');
                    // $('#formEditStok').attr('action', 'stok/' + response.id );
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
            };
    </script>
@endsection
