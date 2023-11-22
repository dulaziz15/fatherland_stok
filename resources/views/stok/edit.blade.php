<form id="formEditStok" style="display: none" method="POST">
    @csrf
    @method('PUT')
    <h3>Edit Barang</h3>
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="exampleFormControlTextarea1">Barang</label>
                    <input type="text" id="barang" class="form-control" name="barang" disabled />
                    <input type="hidden" id="id_barang" class="form-control" name="id_barang" />
                </div>
                <div class="col-lg-12">
                    <div class="form-outline">
                        <label for="exampleFormControlTextarea1">Kondisi</label>
                        <select class="form-select" id="kondisi" name="jumlah"
                            data-placeholder="Choose one thing" required>
                            <option value="{{ \App\Enums\enumsSisa::banyak }}">{{ \App\Enums\enumsSisa::banyak }}
                            </option>
                            <option value="{{ \App\Enums\enumsSisa::setengah }}">{{ \App\Enums\enumsSisa::setengah }}
                            </option>
                            <option value="{{ \App\Enums\enumsSisa::seperempat }}">
                                {{ \App\Enums\enumsSisa::seperempat }}</option>
                            <option value="{{ \App\Enums\enumsSisa::sedikit }}">{{ \App\Enums\enumsSisa::sedikit }}
                            </option>
                            <option value="{{ \App\Enums\enumsSisa::habis }}">{{ \App\Enums\enumsSisa::habis }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note Update</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note" required></textarea>
                    </div>
                </div>
            </div>
        <div class="row mt-4">
            <div class="d-flex justify-content-end">
                <button class="btn bg-gradient-dark mx-2" type="button" onclick="closeFormEdit()">Tutup</button>
                <button class="btn bg-gradient-danger mx-2" type="reset">Reset</button>
                <button class="btn bg-gradient-success" type="submit" id="updateStok">Simpan</button>
            </div>
        </div>
</form>
