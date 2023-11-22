<form action="{{ route('stok.store') }}" method="post" id="formStok" style="display: none">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            <label for="exampleFormControlTextarea1">Barang</label>
            <select class="form-select" id="single-select-field" name="barang" data-placeholder="Choose one thing" required>
                <option>-- Pilih barang --</option>
                @foreach ($satuan as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6">
            <label for="exampleFormControlTextarea1">Kondisi</label>
            <select class="form-select" id="single-select-field" name="jumlah" data-placeholder="Choose one thing" required>
                <option>-- Pilih kondisi barang --</option>
                <option value="{{ \App\Enums\enumsSisa::banyak }}">{{ \App\Enums\enumsSisa::banyak }}</option>
                <option value="{{ \App\Enums\enumsSisa::setengah }}">{{ \App\Enums\enumsSisa::setengah }}</option>
                <option value="{{ \App\Enums\enumsSisa::seperempat }}">{{ \App\Enums\enumsSisa::seperempat }}</option>
                <option value="{{ \App\Enums\enumsSisa::sedikit }}">{{ \App\Enums\enumsSisa::sedikit }}</option>
                <option value="{{ \App\Enums\enumsSisa::habis }}">{{ \App\Enums\enumsSisa::habis }}</option>
            </select>
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
    <div class="row mt-3 p-2">
        <div class="col-lg-12 d-flex justify-content-end align-items-center">
            <button class="btn bg-gradient-dark" onclick="tutupFormBarang()" type="button">Tutup</button>
            <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
            <button class="btn bg-gradient-success" type="submit">Simpan</button>
        </div>
    </div>
</form>
