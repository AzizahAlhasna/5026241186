@extends('template')
@section('title', 'Data stock VGA')
@section('konten')

    <h2> <br>Stock VGA</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif


<a href="{{ route('vga.create') }}" class="btn btn-primary">Beli</a>
<br>
</br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Kode Barang</th>
            <th>Merk</th>
            <th>Stock Hardisk</th>
            <th>Status</th>

        </tr>

        @forelse($vga as $row)
            <tr>
                <td>{{ $row->kodevga }}</td>
                <td>{{ $row->merkvga }}</td>
                <td>{{ $row->stockvga }}</td>
                <td>{{ $row->tersedia }}</td>
                <td>
                        <form action="{{ route('vga.destroy', $row->kodevga) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data di stock VGA.</td>
                </tr>
            @endforelse
        </table>
    @endsection
