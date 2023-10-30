<form action="{{ route('action_masuk') }}" id="formMasuk" style="display: none" method="POST">
    @csrf
    @method('POST')
    <span class="badge badge-pill badge-lg bg-gradient-success">Barang Masuk</span>
    <div class="row">
        <div class="col-lg-6">
            <label for="exampleFormControlTextarea1">Barang</label>
            <select class="form-select" id="single-select-field" name="barang" data-placeholder="Choose one thing" required>
                <option></option>
                @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6">
            <label for="exampleFormControlTextarea1">Type</label>
            <select class="form-select type" name="type" onchange="disableSisa()" data-placeholder="Choose one thing">
                <option value="paket">Paket</option>
                <option value="satuan">Satuan</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-outline">
                <label class="form-label" for="form8Example3">Jumlah</label>
                <input type="number" id="form8Example3" class="form-control" name="jumlah" required/>
            </div>
        </div>
        <div class="col-lg-6">
            <label for="exampleFormControlTextarea1">Kondisi</label>
            <select class="form-select sisa" name="sisa" data-placeholder="Choose one thing"
                name="id_category" disabled>
                <option></option>
                <option id="value1" value="{{ \App\Enums\enumsSisa::banyak }}">{{ \App\Enums\enumsSisa::banyak }}</option>
                <option id="value1" value="{{ \App\Enums\enumsSisa::habis }}">{{ \App\Enums\enumsSisa::habis }}</option>
                <option id="value1" value="{{ \App\Enums\enumsSisa::sedikit }}">{{ \App\Enums\enumsSisa::sedikit }}</option>
                <option id="value1" value="{{ \App\Enums\enumsSisa::setengah}}">{{ \App\Enums\enumsSisa::setengah }}</option>
                <option id="value1" value="{{ \App\Enums\enumsSisa::seperempat}}">{{ \App\Enums\enumsSisa::seperempat }}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-outline">
                <label class="form-label" for="form8Example3">Tujuan</label>
                <input type="text" id="form8Example3" class="form-control" name="tujuan" required/>
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
        <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
        <button class="btn bg-gradient-success" type="submit">Simpan</button>
    </div>
</form>
