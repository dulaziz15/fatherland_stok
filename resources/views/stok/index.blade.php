@extends('layouts.admin')
@section('card_judul', 'Stok Barang')
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 justify-content-start">
                    <span class="badge badge-pill badge-lg bg-gradient-warning">Barang Type Satuan</span>
                </div>
                <div class="col-lg-6 justify-content-end">
                    <div class="d-flex justify-content-end align-items-center">
                        <button class="btn bg-gradient-dark mb-0" onclick="addFormStok()"><i class="fas fa-plus"
                                aria-hidden="true"></i>&nbsp;&nbsp;Add Barang Satuan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                @include('stok.create')
                @include('stok.edit')
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">stand
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">barang
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kondisi
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
                            @if ($item->barang->type == \App\Enums\enumType::Satuan)
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
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->sisa }}</p>
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
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @include('components.admin.paginate', ['paginator' => $stok])
                @include('components.admin.empty', ['data' => $stok])
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <span class="badge badge-pill badge-lg bg-gradient-warning">Barang Type Paket</span>
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
                            @if ($item->barang->type == \App\Enums\enumType::Paket)
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
                                            {{-- <div class="col-lg-3">
                                                <button class="btn bg-gradient-warning d-none d-md-block"
                                                    onclick="formEditStok({{ $item->id }})" title="Edit"><span
                                                        class="btn-inner--icon text-white"><i
                                                            class="fa fa-pencil"></i></span></button>
                                            </div> --}}
                                        </div>
                                        {{-- mobile --}}
                                        <div class="btn-group dropleft mt-3 d-md-none">
                                            <button type="button" class="btn bg-gradient-dark dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">

                                            </button>
                                            <ul class="dropdown-menu px-2 py-3 bg-body border"
                                                aria-labelledby="dropdownMenuButton">
                                                {{-- <li><button onclick="formEditStok({{ $item->id }})" title="Edit"
                                                        class="dropdown-item border-radius-md">Edit</button></li>
                                                <li> --}}
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @include('components.admin.paginate', ['paginator' => $stok])
                @include('components.admin.empty', ['data' => $stok])
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

        function tutupFormBarang() {
            const form = $('#formEditStok');
                form.fadeOut();
                $('#formStok').fadeOut();
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
                    $('#kondisi').prepend(`<option value="` + response.sisa + `" selected>` + response.sisa + `</option>`);
                    $('#barang').val(response.barang.name);
                    $('#id_barang').val(response.barang.id);
                    $('#note').val(response.note);
                    $('#updateStok').attr('onclick', 'formUpdate(' + response.id + ')');
                    $('#formEditStok').attr('action', 'stok/' + response.id);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            })
        }

        function formUpdate(id) {
            $.ajax({
                url: '/category/' + id,
                method: 'PUT',
                dataType: 'json',
                data: {
                    jumlah: $('#kondisi').val(),
                    barang: $('#id_barang').val(),
                    note: $('#note_barang').val(),
                },
                success: function(response) {
                    let responseData = response.id;
                },
            })
        }
    </script>
@endsection
