<div class="row" id="formEditReport" style="display: none">
    <form id="formUpdateReport" method="POST">
        @csrf
        @method('PUT')
        <span class="badge badge-pill badge-lg bg-gradient-warning">Edit Report</span>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-outline">
                    <label class="form-label" for="form8Example3">Barang</label>
                    <input type="text" id="barangReport" class="form-control" name="barang" disabled/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-outline">
                    <label class="form-label" for="form8Example3">Jumlah</label>
                    <input type="number" id="jumlahReport" class="form-control" name="jumlah" />
                </div>
            </div>
        </div>
        <div class="row mt-3 p-2">
            <div class="col-lg-12 d-flex justify-content-end align-items-center">
                <button class="btn bg-gradient-dark mx-2" type="button" onclick="closeFormPenjualan()">Tutup</button>
                <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
                <button class="btn bg-gradient-success" id="submitUpdate" type="submit">Simpan</button>
            </div>
        </div>
    </form>
</div>
