<form action="{{ route('action_masuk') }}" id="formMasuk" style="display: none" method="POST">
    @csrf
    @method('POST')
    <span class="badge badge-pill badge-lg bg-gradient-success">Barang Masuk</span>
    <div class="row">
        <div class="col-lg-6">
            <label for="exampleFormControlTextarea1">Barang</label>
            <select class="form-select select-filter-barang" name="barang" data-placeholder="Choose one thing"
                required>
                <option></option>
                @foreach ($barang as $item)
                    @if($item->type == \App\Enums\enumType::Paket)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-lg-6">
            <div class="form-outline">
                <label class="form-label" for="form8Example3">Jumlah</label>
                <input type="number" class="form-control action-jumlah" name="jumlah" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Note</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note" required></textarea>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn bg-gradient-dark" onclick="tutupForm()" type="button">Tutup</button>
        <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
        <button class="btn bg-gradient-success" type="submit">Simpan</button>
    </div>
</form>
