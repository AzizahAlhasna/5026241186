@extends('template')
@section('title', 'Data Tagihan Air')
@section('konten')

    <h2> <br>Kode Soal tagihan_air</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif


<a href="{{ route('tagihan_air.create') }}" class="btn btn-primary">Input Tagihan Baru</a>
<br>
</br>

    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>No Meteran</th>
            <th>Penggunaan </th>
            <th>Total Tagihan </th>
            <th>Pembatalan</th>
        </tr>

        @forelse($tagihan_air as $row)
            <tr>
                <td>{{ $row->ID }}</td>
                <td>{{ $row->NoMeteran }}</td>
                <td>{{ number_format($row->MaterAkhir - $row->MeterAwal) }}</td>
                <td>
                    Rp {{ number_format(($row->MaterAkhir - $row->MeterAwal) * 5000, 0, ',', '.') }}
                </td>
                <td>
                    <form action="{{ route('tagihan_air.destroy', $row->ID) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus tagihan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data di tagihan air.</td>
                </tr>
            @endforelse
        </table>
    @endsection
