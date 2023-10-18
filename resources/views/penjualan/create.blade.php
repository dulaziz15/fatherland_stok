<form action="{{ route('penjualan.store') }}" method="POST">
    @csrf
    @method('POST')
    <input type="text" name="barang" placeholder="barang">
    <input type="number" name="jumlah" placeholder="jumlah">
    <button type="submit">Create</button>
</form>
