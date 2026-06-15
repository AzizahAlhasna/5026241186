@extends('template')
@section('title', 'tambah tagihan air')
@section('konten')
<h2>Tambah Tagihan Air</h2>
@if ($errors->any())
<ul style="color: red;">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif
<form action="{{ route('tagihan_air.store') }}" method="POST" onsubmit="return validasiForm()">
@csrf
<p>
<label>ID</label><br>
<input type="text" name="ID" id="ID" value="{{ old('ID') }}">
</p>
<p>
<label>No Meteran</label><br>
<input type="text" name="NoMeteran" id="NoMeteran" value="{{ old('NoMeteran') }}">
</p>
<p>
<label>Meter Awal</label><br>
<input type="text" name="MeterAwal" id="MeterAwal" value="{{ old('MeterAwal') }}">
</p>
<p>
<label>Mater Akhir</label><br>
<input type="text" name="MaterAkhir" id="MaterAkhir" value="{{ old('MaterAkhir') }}">
</p>
<button type="submit" class="btn btn-success">Tambah Tagihan</button>
<a href="{{ route('tagihan_air.index') }}" class="btn btn-secondary">Kembali</a>
</form>
<script>
function validasiForm() {
    let id = document.getElementById('ID').value.trim();
    let noMeteran = document.getElementById('NoMeteran').value.trim();
    let meterAwal = document.getElementById('MeterAwal').value.trim();
    let meterAkhir = document.getElementById('MaterAkhir').value.trim();

    if (id === '' || isNaN(id)) {
        Swal.fire({
            title: "Kesalahan Input Data!",
            text: "ID wajib diisi dan harus berupa angka",
            icon: "error"
        });
        return false;
    }

    if (noMeteran === '') {
        Swal.fire({
            title: "Kesalahan Input Data!",
            text: "No Meteran wajib diisi",
            icon: "error"
        });
        return false;
    }

    if (meterAwal === '' || isNaN(meterAwal)) {
        Swal.fire({
            title: "Kesalahan Input Data!",
            text: "Meter Awal wajib diisi dan harus berupa angka",
            icon: "error"
        });
        return false;
    }

    if (meterAkhir === '' || isNaN(meterAkhir)) {
        Swal.fire({
            title: "Kesalahan Input Data!",
            text: "Meter Akhir wajib diisi dan harus berupa angka",
            icon: "error"
        });
        return false;
    }

    if (parseInt(meterAkhir) <= parseInt(meterAwal) + 20) {
        Swal.fire({
            title: "Kesalahan Input Data!",
            text: "Meter Akhir harus lebih besar dari Meter Awal + 20",
            icon: "error"
        });
        return false;
    }

    return true;
}
</script>
@endsection
