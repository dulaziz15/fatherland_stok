<div class="row" id="formReport" style="display: none">
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-lg-6">
                <label for="exampleFormControlTextarea1">Barang</label>
                    <select class="form-select" id="single-select-field" name="barang" data-placeholder="Choose one thing">
                        <option></option>
                        <option value="piscok">Piscok</option>
                        <option value="brownis">Brownis</option>
                    </select>
            </div>
            <div class="col-lg-6">
                <div class="form-outline">
                    <label class="form-label" for="form8Example3">Jumlah</label>
                    <input type="number" id="form8Example3" class="form-control" name="jumlah" />
                </div>
            </div>
        </div>
        <div class="row mt-3 p-2">
            <div class="col-lg-12 d-flex justify-content-end align-items-center">
                <button class="btn bg-gradient-dark mx-2" type="button" onclick="closeFormPenjualan()">Tutup</button>
                <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
                <button class="btn bg-gradient-success" type="submit">Simpan</button>
            </div>
        </div>
    </form>
</div>
