@extends('layouts.admin')
@section('card_judul', 'Transaction')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="d-flex justify-content-end align-items-center mx-2">
                        <button class="btn bg-gradient-success mb-0" onclick="actionMasuk()"><i class="fas fa-plus"
                                aria-hidden="true"></i>&nbsp;&nbsp;Masuk</button>

                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <button class="btn bg-gradient-danger mb-0" onclick="actionKeluar()"><i class="fas fa-minus"
                                aria-hidden="true"></i>&nbsp;&nbsp;Keluar</button>

                    </div>
                </div>
            </div>
            @include('action.masuk')
            @include('action.keluar')
        </div>
        <div class="card-body">
            @foreach ($log as $item)
                {{ $item->barang->name }}
            @endforeach
        </div>
    </div>
    <script>
        function actionMasuk() {
            const form = $('#formMasuk');
            if (form.is(':visible')) {
                form.fadeOut();
            } else {
                form.fadeIn();
            }
        }

        function actionKeluar() {

        }
    </script>
@endsection
