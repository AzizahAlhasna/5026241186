@extends('template')
@section('title', 'Tambah VGA')
@section('konten')

    <h2>Tambah VGA</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('vga.store') }}" method="POST" onsubmit="return validasiForm()">
        @csrf

        <p>
            <label>Kode Barang</label><br>
            <input type="text" name="KodeBarang" id="KodeBarang" value="{{ old('KodeBarang') }}">
        </p>

        <p>
            <label>Merk</label><br>
            <input type="text" name="Merk" id="Merk" value="{{ old('Merk') }}">
        </p>

        <p>
            <label>Stock Hardisk</label><br>
            <input type="text" name="StockHardisk" id="StockHardisk" value="{{ old('StockHardisk') }}">
        </p>

        <p>
            <label>Tersedia</label><br>
            <select name="Tersedia" id="Tersedia">
                <option value="Y">Y</option>
                <option value="N">N</option>
            </select>
        </p>

        <button type="submit" class="btn btn-success">Beli</button>
        <a href="{{ route('vga.indexvga') }}" class="btn btn-secondary">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let kodeBarang = document.getElementById('KodeBarang').value.trim();
            let merk = document.getElementById('Merk').value.trim();
            let stockHardisk = document.getElementById('StockHardisk').value.trim();
            let tersedia = document.getElementById('Tersedia').value.trim();
        }
    </script>
@endsection

