@extends('layouts.admin')
@section('card_judul', 'Penjualan')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end align-items-center">
                <button class="btn bg-gradient-dark mb-0" onclick="addReport()"><i class="fas fa-plus"
                        aria-hidden="true"></i>&nbsp;&nbsp;Add Report Penjualan</button>
            </div>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                @include('penjualan.create')
                @include('penjualan.edit')
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pegawai
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            </th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                            <tr>
                                <td>
                                    <div class="d-flex py-1">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->stand->pegawai }}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->barang }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at->format('d F, Y') }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row justify-content-end mx-3">
                                        <div class="col-lg-2">
                                            <form action="{{ route('penjualan.destroy', $item->id) }}" id="deleteForm" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn bg-gradient-danger d-none d-md-block button-delete" onclick="return confirmDelete('penjualan ini')" data-bs-toggle="tooltip" title="Delete"
                                                    type="button"><span class="btn-inner--icon text-white"><i
                                                            class="fas fa-trash"></i></span></button>
                                            </form>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn bg-gradient-warning d-none d-md-block"
                                                onclick="formEditReport({{ $item->id }})" title="Edit"><span
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
                                            <li><button onclick="formEditReport({{ $item->id }})" title="Edit"
                                                class="dropdown-item border-radius-md">Edit</button></li>
                                        <li>
                                            <li>
                                                <form action="{{ route('penjualan.destroy', $item->id) }}" id="deleteForm" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirmDelete('penjualan ini')"
                                                        class="dropdown-item border-radius-md"
                                                        type="button">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('components.admin.paginate', ['paginator' => $penjualan])
                @include('components.admin.empty', ['data' => $penjualan])
            </div>
        </div>
    </div>
    <script>
        function getData(id) {

    }
        function closeFormPenjualan(){
            $('#formReport').fadeOut();
            $('#formEditReport').fadeOut();
        }

        function formEditReport(id){
            $('#formReport').fadeOut();
            $('#formEditReport').fadeIn();
            $.ajax({
            url: '/penjualan/' + id + '/edit',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#barangReport').val(response.barang);
                $('#jumlahReport').val(response.jumlah);
                $('#submitUpdate').attr('onclick', 'formUpdate(' + response.id + ')');
                $('#formUpdateReport').attr('action', 'penjualan/' + response.id + '');
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        }

        function formUpdate(id) {
        let category = $('#jumlahReport').val();
        $.ajax({
            url: '/penjualan/' + id,
            method: 'PUT',
            dataType: 'json',
            data: {
                jumlah: jumlah
            },
            success: function(response) {
                let responseData = response.category;
            },
        })
    }
    </script>
@endsection
