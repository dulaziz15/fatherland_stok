<form action="{{ route('stok.store') }}" id="formStok" style="display: none" method="POST">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="exampleFormControlTextarea1">Barang</label>
                    <select class="form-select" id="single-select-field" name="barang" data-placeholder="Choose one thing"
                        name="id_category">
                        <option></option>
                        @foreach ($barang as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">Jumlah</label>
                        <input type="number" id="form8Example3" class="form-control" name="jumlah" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note" required></textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
                <button class="btn bg-gradient-success" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</form>
