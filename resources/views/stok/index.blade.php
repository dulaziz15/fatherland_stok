@extends('layouts.admin')
@section('card_judul', 'Stok Barang')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <div class="d-flex justify-content-end align-items-center">
                <button class="btn bg-gradient-dark mb-0" onclick="addFormStok()"><i class="fas fa-plus"
                        aria-hidden="true"></i>&nbsp;&nbsp;Add Stok Barang</button>

            </div> --}}
            @include('stok.create')
            @include('stok.edit')
        </div>
        <div class="table-responsive">
            <div class="card-body">

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">stand
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">barang
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Note
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Create
                                At</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            </th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stok as $item)
                            <tr>
                                <td>
                                    <div class="d-flex py-1">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->stand->pegawai }}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->barang->name }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->note }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row justify-content-end mx-3">
                                        <div class="col-lg-3">
                                            <form action="{{ route('stok.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn bg-gradient-danger d-none d-md-block"
                                                    onclick="return confirm()" data-bs-toggle="tooltip" title="Delete"
                                                    type="submit"><span class="btn-inner--icon text-white"><i
                                                            class="fas fa-trash"></i></span></button>
                                            </form>
                                        </div>
                                        <div class="col-lg-3">
                                            <button class="btn bg-gradient-warning d-none d-md-block"
                                                onclick="formEditStok({{ $item->id }})" title="Edit"><span
                                                    class="btn-inner--icon text-white"><i
                                                        class="fa fa-pencil"></i></span></button>
                                        </div>
                                    </div>
                                    {{-- mobile --}}
                                    <div class="btn-group dropleft mt-3 d-md-none">
                                        <button type="button" class="btn bg-gradient-dark dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">

                                        </button>
                                        <ul class="dropdown-menu px-2 py-3 bg-body border"
                                            aria-labelledby="dropdownMenuButton">
                                            <li><button onclick="formEditStok({{ $item->id }})" title="Edit"
                                                    class="dropdown-item border-radius-md">Edit</button></li>
                                            <li>
                                            <li>
                                                <form action="{{ route('stok.destroy', $item->id) }}" method="POST">
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
        function addFormStok() {
            const form = $('#formStok');
            if (form.is(':visible')) {
                form.fadeOut();
            } else {
                $('#formEditStok').fadeOut();
                form.fadeIn();
            }
        }

        function closeFormEdit() {
            const form = $('#formEditStok');
            if (form.is(':visible')) {
                form.fadeOut();
            } else {
                $('#formStok').hide();
                form.fadeIn();
            }
        }

        function formEditStok(id) {
            const form = $('#formEditStok');
            if (form.is(':visible')) {
                form.fadeOut();
            } else {
                $('#formStok').fadeOut();
                form.fadeIn();
            }
            $.ajax({
                url: '/stok/' + id + '/edit',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#jumlah').val(response.jumlah);
                    $('#barang').append('<option value="' + response.barang.id + '">' + response.barang.name +
                        '</option>');
                    $('#note').val(response.note);
                    $('#updateStok').attr('onclick', 'formUpdate(' + response.id + ')');
                    $('#formEditStok').attr('action', 'stok/' + response.id );
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            })
        }

        function formUpdate(id) {
        let category = $('#category-update').val();
        $.ajax({
            url: '/category/' + id ,
            method: 'PUT',
            dataType: 'json',
            data: {
                barang: $('#barang').val(),
                jumlah: $('#jumlah').val(),
                note: $('#note').val(),
            },
            success: function(response) {
                let responseData = response.id;
            },
        })
    }
    </script>
@endsection
